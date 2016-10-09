<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 09-10-16
 * Time: 06:41 AM
 */
namespace app\models;

use Faker\Provider\Image;
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

    public function upload(){

        $ev=$this->evento;
        if ($this->validate()) {

            foreach ($this->imageFiles as $file) {

                $path = 'fotos/' . $file->baseName . '.' . $file->extension;
                $pathWatermark='marcadeagua/watermark.png';
                $file->saveAs($path);
                $this->insertarmarcadeagua($path,$pathWatermark,5);
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
                   $modelFoto->save();
                }
            }
            return true;
        } else {
            return false;
        }
    }

 function insertarmarcadeagua($imagen,$marcadeagua,$margen)
{
    //Se supone que la marca de agua tiene menor tamaño que la imagen
    //$imagen es la ruta de la imagen. Ej.: "carpeta/imagen.jpg"
    //&marcadeagua es la ruta de la imagen marca de agua. Ej.: "marca.png"
    //$margen determina el margen que quedará entre la marca y los bordes de la imagen

    //Averiguamos la extensión del archivo de imagen
    $trozos_nombre_imagen=explode(".",$imagen);
    $extension_imagen=$trozos_nombre_imagen[count($trozos_nombre_imagen)-1];

    //Creamos la imagen según la extensión leída en el nombre del archivo
    if(preg_match('/jpg|jpeg|JPG|JPEG/',$extension_imagen))
        $img=ImageCreateFromJPEG($imagen);
    if(preg_match('/png|PNG/',$extension_imagen))
        $img=ImageCreateFromPNG($imagen);
    if(preg_match('/gif|GIF/',$extension_imagen))
        $img=ImageCreateFromGIF($imagen);

    //declaramos el fondo como transparente
    ImageAlphaBlending($img, true);

    //Ahora creamos la imagen de la marca de agua
    $marcadeagua = ImageCreateFromPNG($marcadeagua);

    //Hallamos las dimensiones de ambas imágenes para alinearlas
    $Xmarcadeagua = imagesx($marcadeagua);
    $Ymarcadeagua = imagesy($marcadeagua);
    $Ximagen = imagesx($img);
    $Yimagen = imagesy($img);

    //Copiamos la marca de agua encima de la imagen (alineada abajo a la derecha)
    imagecopy($img, $marcadeagua, $Ximagen-$Xmarcadeagua-$margen, $Yimagen-$Ymarcadeagua-$margen, 0, 0, $Xmarcadeagua, $Ymarcadeagua);

    //Guardamos la imagen sustituyendo a la original, en este caso con calidad 100
    ImageJPEG($img,$imagen,100);

    //Eliminamos de memoria las imágenes que habíamos creado
    imagedestroy($img);
    imagedestroy($marcadeagua);
}

}