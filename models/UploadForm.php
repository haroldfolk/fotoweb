<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 09-10-16
 * Time: 06:41 AM
 */
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    public $evento;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 5],
        ];
    }

    public function upload()
    {$ev=$this->evento;
        if ($this->validate()) {

            foreach ($this->imageFiles as $file) {

                $path = 'fotos/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);

                $archivo = $path;
                $fp = fopen($archivo, 'rb');
                if ($fp) {
                    $datos = fread($fp, filesize($archivo)); // cargo la imagen
                    fclose($fp);
// averiguo su tipo mime
                    $tipo_mime = 'image/jpeg';
                    $isize = getimagesize($archivo);
                    if ($isize) {
                        $tipo_mime = $isize['mime'];
                    }
// La guardamos en la BD
                    $datos = base64_encode($datos);
                    $modelFoto = new Foto();
                    $modelFoto->fotoMuestra = $datos;
                    $modelFoto->tipoFoto = $tipo_mime;
                    $modelFoto->enlace = "no hay";
                    $modelFoto->id_Evento = $ev;
                   if ($modelFoto->save()){

                   }else{
                       print_r($modelFoto);
                       exit();

                   }
                }
            }
            return true;
        } else {
            return false;
        }
    }
}