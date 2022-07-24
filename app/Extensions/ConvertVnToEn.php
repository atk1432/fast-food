<?php 

namespace App\Extensions;

class ConvertVnToEn
{

    /**
     * Value VN text.
     * 
     * @var string $text
     */
    public $text;

    /**
     * List of letters 
     * 
     * @var array(string, string)
     */
    private $letters = [
        'a' => ['ạ', 'ả', 'ã', 'à', 'á', 'â', 'ậ', 'ầ', 'ấ', 'ẩ', 'ẫ', 'ă', 'ắ', 'ằ', 'ặ', 'ẳ', 'ẵ'],
        'A' => ['Ạ', 'Ả', 'Ã', 'À', 'Á', 'Â', 'Ậ', 'Ầ', 'Ấ', 'Ẩ', 'Ẫ', 'Ă', 'Ắ', 'Ằ', 'Ặ', 'Ẳ', 'Ẵ'],
        'o' => ['ó', 'ò', 'ọ', 'õ', 'ỏ', 'ô', 'ộ', 'ổ', 'ỗ', 'ồ', 'ố', 'ơ', 'ờ', 'ớ', 'ợ', 'ở', 'ỡ'],
        'O' => ['Ó', 'Ò', 'Ọ', 'Õ', 'Ỏ', 'Ô', 'Ộ', 'Ổ', 'Ỗ', 'Ồ', 'Ố', 'Ơ', 'Ờ', 'Ớ', 'Ợ', 'Ở', 'Ỡ'],
        'E' => ['É', 'È', 'Ẻ', 'Ẹ', 'Ẽ', 'Ê', 'Ế', 'Ề', 'Ệ', 'Ể', 'Ễ'],
        'I' => ['Í', 'Ì', 'Ị', 'Ỉ', 'Ĩ'],
        'U' => ['Ú', 'Ù', 'Ụ', 'Ủ', 'Ũ', 'Ư', 'Ự', 'Ữ', 'Ử', 'Ừ', 'Ứ'],
        'Y' => ['Ý', 'Ỳ', 'Ỷ', 'Ỵ', 'Ỹ'],
        'd' => ['đ'],
        'e' => ['é', 'è', 'ẻ', 'ẹ', 'ẽ', 'ê', 'ế', 'ề', 'ệ', 'ể', 'ễ'],
        'i' => ['í', 'ì', 'ị', 'ỉ', 'ĩ'],
        'u' => ['ú', 'ù', 'ụ', 'ủ', 'ũ', 'ư', 'ự', 'ữ', 'ử', 'ừ', 'ứ'],
        'y' => ['ý', 'ỳ', 'ỷ', 'ỵ', 'ỹ'],
        'D' => ['Đ']
    ];

    /**
     * Construct of value of VN text.
     * 
     * @param string $text
     */
    public function __construct($text) 
    {
        $this->text = $text;
    }

    /**
     * Convert VN text to EN text. 
     * 
     * @return string
     */
    public function convert() {

        $output = $this->text;

        foreach ($this->letters as $key => $item) {
            $output = str_replace($item, $key, $output);
        }

        return $output;

    }

}

?>