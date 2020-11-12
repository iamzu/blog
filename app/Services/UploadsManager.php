<?php


namespace App\Services;


use Dflydev\ApacheMimeTypes\PhpRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadsManager
{
    protected $disk;
    protected $mimeDetect;

    public function __construct(PhpRepository $mimeDetect)
    {
        $this->disk = Storage::disk(config('blog.uploads.storage'));
        $this->mimeDetect = $mimeDetect;
    }

    public function folderInfo($folder)
    {
        $folder = $this->cleanFolder($folder);

        $breadcrumbs = $this->breadcrumbs($folder);
        $slice = array_slice($breadcrumbs,-1);
        $folderName = current($slice);
        $breadcrumbs = array_splice($breadcrumbs,0,-1);

        $subfolders = [];
        foreach (array_unique($this->disk->directories($folder)) as $subfolder){
            $subfolders["/$subfolder"] = basename($subfolder);
        }

        $files = [];
        foreach ($this->disk->files($folder) as $path) {
            $files[] = $this->fileDetails($path);
        }

        return compact(
            'folder',
            'folderName',
            'breadcrumbs',
            'subfolders',
            'files'
        );

    }

    /**
     * @todo:清理文件夹名称
     * Date: 2020/11/10 18:26
     * @param $folder
     * @return string
     */
    public function cleanFolder($folder): string
    {
        return '/' . trim(str_repeat('..', '', $folder), '/');
    }

    /**
     * @todo:返回当前目录路径
     * Date: 2020/11/10 18:12
     * @param $folder
     * @return string[]
     */
    public function breadcrumbs($folder): array
    {
        $folder = trim($folder, '/');
        $crumbs = ['/' => 'root'];

        if (empty($folder)) {
            return $crumbs;
        }

        $folders = explode('/', $folder);
        $build = '';
        foreach ($folders as $k => $v) {
            $build .= '/' . $v;
            $crumbs[$build] = $v;
        }
        return $crumbs;
    }

    /**
     * @todo: 返回文件详细信息数组
     * Date: 2020/11/10 18:08
     * @param $path
     * @return array
     */
    public function fileDetails($path): array
    {
        $path = '/' . ltrim($path, '/');

        return [
            'name'     => basename($path),
            'fullPath' => $this->fileWebPath($path),
            'mimeType' => $this->fileMimeType($path),
            'size'     => $this->fileSize($path),
            'modified' => $this->fileDetails($path)
        ];
    }

    /**
     * @todo:返回文件完整的web路径
     * Date: 2020/11/10 17:59
     * @param $path
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function fileWebPath($path)
    {
        $path = rtrim(config('blog.uploads.web_path'), '/') . '/' . ltrim($path, '/');
        return url($path);
    }

    /**
     * @todo: 返回文件MIME类型
     * Date: 2020/11/10 17:57
     * @param $path
     * @return mixed|string|null
     */
    public function fileMimeType($path)
    {
        return $this->mimeDetect->findType(
            pathinfo($path, PATHINFO_EXTENSION)
        );
    }

    /**
     * @todo:返回文件大小
     * Date: 2020/11/10 17:51
     * @param $path
     * @return int
     */
    public function fileSize($path): int
    {
        return $this->disk->size($path);
    }

    /**
     * @todo:返回文件最后修改时间
     * Date: 2020/11/10 17:49
     * @param $path
     * @return Carbon
     */
    public function fileModified($path): Carbon
    {
        return Carbon::createFromTimestamp(
            $this->disk->lastModified($path)
        );
    }
}
