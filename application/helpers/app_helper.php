<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Name : Custom Helper Codeigniter
 * Author : Jujun Jamaludin
 */

/**
 * dd
 *
 * function for debugging
 *
 * @param  mixed $data
 * @return string
 */
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}

// ------------------------------------------------------------------------

/**
 * is_ajax
 *
 * function for check request from ajax
 *
 * @return bool
 */
function is_ajax()
{
    $isAjaxRequest = false;
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') == 0) {
        $isAjaxRequest = true;
    }
    return $isAjaxRequest;
}

// ------------------------------------------------------------------------

/**
 * str_random
 *
 * for create random string
 *
 * @param  int $length
 * @return string
 */
function str_random($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// ------------------------------------------------------------------------

/**
 * format_number
 *
 * function for format number money to clean integer
 *
 * @param  int $number
 * @return int
 */
function format_number($number)
{
    $number = str_replace('.', '', $number);
    return str_replace(',', '.', $number);
}

// ------------------------------------------------------------------------

/**
 * rp_format
 *
 * function for create rupiah money
 *
 * @param  int $number
 * @return int
 */
function rp_format($number)
{
    $hasil = "Rp " . number_format($number, 0, ',', '.');
    return $hasil;
}

// ------------------------------------------------------------------------

/**
 * format_date
 *
 * function for format date to
 *
 * @param  string $date
 * @return string
 */
function format_date($date)
{
    if (empty($date)) return "-";
    $month = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    list($tahun, $bulan, $tanggal) = explode('-', $date);
    $result = $tanggal . '-' . ($month[(int)$bulan - 1]) . '-' . $tahun;
    return ($result);
}

// ------------------------------------------------------------------------ ]

/**
 * is_multi_array
 *
 * checking is multi array
 *
 * @param  array $array
 * @return bool
 */
function is_multi_array($array)
{
    foreach ($array as $v) {
        if (is_array($v)) return true;
    }
    return false;
}



// ------------------------------------------------------------------------

/**
 * get_enum_values
 *
 * fungsi untuk mengambil data enum dari tabel
 *
 * @param  string $table
 * @param  string $field
 * @return array
 * @link https://stackoverflow.com/questions/2350052/how-can-i-get-enum-possible-values-in-a-mysql-database
 */
function get_enum_values($table, $field)
{
    $CI = &get_instance();

    $type = $CI->db->query("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'")->row(0)->Type;
    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
    $enum = explode("','", $matches[1]);
    return $enum;
}

// ------------------------------------------------------------------------

/**
 * to_label
 *
 * fungsi untuk mengubah string menjadi label / judul
 *
 * @param  string $text
 * @return string
 */
function to_label($text)
{
    $text = str_replace('_', ' ', $text);
    $text = ucfirst($text);

    return $text;
}

// ------------------------------------------------------------------------

/**
 * setting
 *
 * Fungsi untuk mengambil data setting berdasarkan column name
 *
 * @param  string $name
 * @return mixed string | boolean
 */
function setting($name)
{
    $CI = &get_instance();

    $where = [
        'name' => $name
    ];

    $query = $CI->db->query("SELECT value from setting WHERE name = ?", $where);

    if ($query) {
        $result = $query->row()->value;
    } else {
        $result = FALSE;
    }

    return $result;
}



// ------------------------------------------------------------------------

/**
 * send_telegram
 *
 * Fungsi untuk notif dengan telegram api
 *
 * @param string $message
 * @param string $bot_token
 * @param string $target_id
 * @return json
 */
function send_telegram($message, $bot_token, $target_id)
{
    $ch = curl_init();
    $data = http_build_query([
        'chat_id'    => $target_id,
        'text'       => $message,
        'parse_mode' => 'html'
    ]);

    curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . $bot_token . '/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        die(curl_errno($ch));
    }
    curl_close($ch);
    return $result;
}



function slugify($text, string $divider = '-')
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}


/**
 * generate_otp
 *
 * function for generate otp token
 *
 * @param  int $n
 * @return int
 */
function generate_otp($n)
{
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand() % (strlen($generator))), 1);
    }

    // Return result
    return $result;
}

/**
 * set_alert
 *
 * @param  string $message
 * @param  string $type
 * @return string
 */
function set_alert($message, $type = 'primary')
{
    $CI = &get_instance();

    $message = '<div class="alert alert-' . $type . '" role="alert">
					' . strip_tags($message) . '
				</div>';
    return $CI->session->set_flashdata('action_status', $message);
}
