<?php
/**
 * Created by PhpStorm.
 * User: nampr
 * Date: 29/07/2018
 * Time: 9:06 AM
 */
namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use App\Model\Banners;
use App\Model\News;

class DeleteController extends Controller{
    public $_news;

    public function __construct(News $news){
        $this->_news=$news;
    }
    public function index($id){
        $this->_news->find($id)->delete();
        return redirect()->route('news.index');
    }
}