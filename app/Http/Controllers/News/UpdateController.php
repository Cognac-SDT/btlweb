<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:30 AM
 */
namespace App\Http\Controllers\News;
use App\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditNewsRequest;
use App\Model\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller{
    private $_news;

    public function __construct(News $news){
        $this->_news=$news;
    }
    public function index(EditNewsRequest $rq,$id){
        $n = News::find($id);
        $n->title = $rq->txtTitle;
        $n->slug = str_slug($rq->txtTitle,'-');
        $n->author = $rq->txtAuth;
        $n->tag = $rq->txttag;
        $n->status = $rq->slstatus;
        $n->source = $rq->txtSource;
        $n->intro = $rq->txtIntro;
        $n->full = $rq->txtFull;
        $n->cat_id = $rq->sltCate;

        $n->created_at = new datetime;

        $file_path = public_path('uploads/news/').$n->images;
        if ($rq->hasFile('txtimg')) {
            if (file_exists($file_path))
            {
                unlink($file_path);
            }

            $f = $rq->file('txtimg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $n->images = $filename;
            $rq->file('txtimg')->move('uploads/news/',$filename);
        }

        $n->save();
        return redirect('admin/bai-viet/danh-sach')
            ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa thành công !']);
    }
}