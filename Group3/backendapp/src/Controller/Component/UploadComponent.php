<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Inflector;
use Cake\Utility\Text;

/**
 * Upload component
 */
class UploadComponent extends Component
{

    public function uploadSingle($data, $isCreateThumb = true)
    {
        $path = '';
        if (!empty($data)) {
            $dir = WWW_ROOT . 'files' . DS . 'uploads';
            $filename = trim($data['name']);
            $file_tmp_name = $data['tmp_name'];
            if (is_uploaded_file($file_tmp_name)) {
                $file_name = pathinfo($filename);
                $newfilename = $file_name['filename'];
                $newname = $newfilename . '.' . $file_name['extension'];
                $uploaded = $dir . DS . $newname;
                $path = 'files/uploads/' . $newname;
                move_uploaded_file($file_tmp_name, $uploaded);
            }
        }
        $res = $path;
        return $res;
    }

    private function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

}
