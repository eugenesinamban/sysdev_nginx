<?php

class ImageService {
    public function upload($image) {
        $image_filename = $this->upload_binary($image);
        if ($image_filename === null) {
            return false;
        }
        return $image_filename;
    }

    protected function upload_binary($image) : ?string {
        try {
            $image_filename = null;
            // 先頭の data:~base64, のところは削る
            $base64 = preg_replace('/^data:.+base64,/', '', $image);
        
            // base64からバイナリにデコードする
            $image_binary = base64_decode($base64);
        
            // 新しいファイル名を決めてバイナリを出力する
            $image_filename = strval(time()) . bin2hex(random_bytes(25)) . '.png';
            $filepath =  '/var/www/public/image/' . $image_filename;
            file_put_contents($filepath, $image_binary);
            return $image_filename;
        } catch (Exception $e) {
            return null;
        }
    }
}