<?php

namespace App\Controller\Admin;
use App\Entity\OurWorks;
use App\Service\ConfigService;
use App\Service\ImageProcessorService;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/admin/our-works", name="admin_our_works_")
 */
class OurWorksController
{
    /**
     * @var ConfigService
     */
    protected $configs;
    /**
     * @var ImageProcessorService
     */
    protected $image_processor;
    
    public function __construct(ConfigService $configs, ImageProcessorService $image_processor)
    {
        $this->configs = $configs;
        $this->image_processor = $image_processor;
    }
    
    /**
     * @Route("/upload-images/{id}", name="upload_images", methods={"POST"})
     */
    public function uploadImages(Request $request, OurWorks $our_works): JsonResponse
    {
        /** @var UploadedFile */
        $image_file = $request->files->get('file');
        $root_folder = $request->server->get('DOCUMENT_ROOT');
        $file_name = $image_file->getClientOriginalName();
        $folder = $root_folder.'/'.ltrim($our_works->getImgFolder(),' /');
        try{
            if ($image_file->move($folder, $file_name)) {
                $response = ['status' => 'OK', 'message' => 'Загружено'];
                $images_config = $this->configs->getCachedGroup('images');
                
                $watermark = $images_config['watermark']?$root_folder.'/'.$images_config['watermark']:null;
                $max_width = $images_config['max_width']??null;
                $quality = $images_config['quality']??null;
                $this->image_processor->processImage($folder.'/'.$file_name,$max_width,null,$watermark,$quality);
            }
            else{
                $response = ['status' => 'ERROR', 'message' => 'Ошибка при сохранении файла на диск'];
            }
        } catch (\Exception $e){
            $response = ['status' => 'ERROR', 'message' => $e->getMessage()];
        }
        
        return new JsonResponse($response);
    }
    /**
     * @Route("/delete-image", name="delete_image", methods={"DELETE"})
     */
    public function deleteImage(Request $request)
    {
        $root_folder = $request->server->get('DOCUMENT_ROOT');
        $file = $request->request->get('file');
        
        if ( ! $file) {
            return new JsonResponse(['status' => false, 'msg' => 'Не указан файл для удаления']);
        }
        if (!file_exists($root_folder.$file) || is_dir($root_folder.$file)) {
            return new JsonResponse(['status' => false, 'msg' => 'Файл не существует']);
        }
        if (unlink($root_folder.$file)) {
            return new JsonResponse(['status' => true, 'msg' => 'Удалено']);
        }
        return new JsonResponse(['status' => false, 'msg' => 'Ошибка при удалении файла']);
    }
}