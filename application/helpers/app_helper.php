<?php

function password_strength(string $pass): bool {
    $upper = 0;
    $lower = 0;
    $number = 0;
    $special = 0;
    for ($i = 0; $i < strlen($pass); $i++) {
        if (
                $pass[$i] >= 'A' &&
                $pass[$i] <= 'Z'
        )
            $upper++;
        else if (
                $pass[$i] >= 'a' &&
                $pass[$i] <= 'z'
        )
            $lower++;
        else if (
                $pass[$i] >= '0' &&
                $pass[$i] <= '9'
        )
            $number++;
        else
            $special++;
    }

    if ($upper != 0 && $lower != 0 && $number != 0 && $special != 0) {
        return true;
    } else {
        return false;
    }
}

function convertNumberToCash(float $amount): float {
    return number_format(money_format('%.2n', $amount), 2);
}

function sanitize(string $string, string $type = 'string'): string {
    switch (strtolower($type)) {
        case 'email':
            return filter_var($string, FILTER_SANITIZE_EMAIL);
            break;
        case 'float':
            return filter_var($string, FILTER_SANITIZE_NUMBER_FLOAT);
            break;
        case 'int':
            return filter_var($string, FILTER_SANITIZE_NUMBER_INT);
            break;
        case 'special':
            return filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
            break;
        case 'url':
            return filter_var($string, FILTER_SANITIZE_URL);
            break;
        default:
            return filter_var($string, FILTER_SANITIZE_STRING);
            break;
    }
}

function generateAccountKey($len = 8) {
    return random_string('alnum', $len);
}

function encrypt($string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = "CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5";
    $secret_iv = "CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5";
    // hash
    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
    return $output;
}

function decrypt($string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = "CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5";
    $secret_iv = "CKXH2U9RPY3EFD70TLS1ZG4N8WQBOVI6AMJ5";
    // hash
    $key = hash('sha256', $secret_key);

    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}

function parse_email_template($template, $data = array()): string {
    $ci = & get_instance();
    $ci->load->helper('file');
    $ci->load->library('parser');

    $templateData = read_file(APPPATH . "views/mail_templates/{$template}.php");
    $parsed_template = $ci->parser->parse_string($templateData, $data, true);
    return $parsed_template;
}

function timeElapsedString($datetime,bool $full = false): string {

    $ci = & get_instance();
    date_default_timezone_set($ci->config->item('time_reference'));
    $now = new DateTime;
    $ago = new DateTime($datetime);

    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function background_run_process(string $cmd,string $params,string $outputFile = '/dev/null',bool $append = false) : int {
    $pid = 0;
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {//'This is a server using Windows!';
        $php_path = exec("where php.exe");
        $file_path = $path = dirname(APPPATH);
        $fixCmd = explode('/', $cmd);
        $ucmd = $php_path.' '.$path.'\index.php ' . $fixCmd[0] .' '. $fixCmd[1] . ' '. $params;
        echo $ucmd;
        $cmd = 'wmic process call create "' . $ucmd . '" | find "ProcessId"';
        $handle = popen("start /B " . $cmd, "r");
        $read = fread($handle, 200); //Read the output 
        $pid = substr($read, strpos($read, '=') + 1);
        $pid = substr($pid, 0, strpos($pid, ';'));
        $pid = (int) $pid;
        pclose($handle); //Close
    } else {
        $pid = (int) shell_exec(sprintf('%s %s %s 2>&1 & echo $!', $cmd, ($append) ? '>>' : '>', $outputFile));
    }
    return $pid;
}

function background_is_process_running(int $pid) : bool {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {//'This is a server using Windows!';
        //tasklist /FI "PID eq 6480"
        $result = shell_exec('tasklist /FI "PID eq ' . $pid . '"');
        if (count(preg_split("/\n/", $result)) > 0 && !preg_match('/No tasks/', $result)) {
            return true;
        }
    } else {
        $result = shell_exec(sprintf('ps %d 2>&1', $pid));
        if (count(preg_split("/\n/", $result)) > 2 && !preg_match('/ERROR: Process ID out of range/', $result)) {
            return true;
        }
    }
    return false;
}

function background_stop_process(int $pid) : bool {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {//'This is a server using Windows!';
        $result = shell_exec('taskkill /PID ' . $pid);
        if (count(preg_split("/\n/", $result)) > 0 && !preg_match('/No tasks/', $result)) {
            return true;
        }
    } else {
        $result = shell_exec(sprintf('kill %d 2>&1', $pid));
        if (!preg_match('/No such process/', $result)) {
            return true;
        }
    }
    return false;
}

function human_readable_date($date) : string{
    return date_format(date_create($date), 'g:ia \o\n l jS F Y');
}

function blog_post_date($date) : string {
    return date_format(date_create($date), 'j M');
}

function isHomogenous($arr) {
    return $arr === array_filter($arr, function ($element) use ($arr) {
        return ($element === $arr[0]);
    });
}
