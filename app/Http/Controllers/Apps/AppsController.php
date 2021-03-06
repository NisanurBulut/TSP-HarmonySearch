<?php

namespace App\Http\Controllers\Apps;

use DB;
use App\Models\AppModel;
use App\Models\DemandModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppsController extends Controller
{
    public function index()
    {
        $apps = AppModel::select('id','name','description','db_name','url_address','url_icon','created_at')->orderBy('created_at', 'DESC')->get();

        return View('apps.index',['apps'=>$apps]);
    }
    public function getApps()
    {
        $apps = AppModel::select('id','name')->get();
        return json_encode($apps);
    }
    public function createApp()
    {
        return View('apps.forms.create-app');
    }
    public function destroyApp($id)
    {
        if (DB::table('tdemand')->where('app_id', $id)->exists()) {
            return back()->with('type','red')->with('icon','times')
            ->with('notification','Uygulamayla ilişkili talep bulunmuştur. işlem iptal edilmiştir.');
         }

        $appEntity = DB::table('tapp')->where('id',$id);
        $appEntity->delete();
        return redirect('apps')->with('type','blue')->with('icon','check')
        ->with('notification','Silme işlemi başarıyla gerçekleşti.');
    }

    public function storeApp(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'db_name' => 'required',
        ]);

        $appEntity = new AppModel();
        $appEntity->name = $request['name'];
        $appEntity->description = $request['description'];
        $appEntity->db_name = $request['db_name'];
        $appEntity->url_address = $request['url_address'];
        $appEntity->url_icon = $request['url_icon'];
        $appEntity->save();
        redirect('apps')->with('type','blue')->with('icon','check')
        ->with('notification','Uygulama başarıyla kaydedildi.');
    }
    public function editApp($id)
    {
        $app = AppModel::findOrFail($id);

        return View('apps.forms.edit-app', ['id'=>$id, 'app'=>$app]);
    }

    public function updateApp(Request $request,$id)
    {
        $validated =  $this->validate($request, [
            'name' => 'required|max:100',
            'description' => 'required|max:500',
            'url_address'=> 'required|max:100',
            'url_icon'=>'required|max:200',
            'db_name'=>'required|max:100'
        ]);
        $app = AppModel::findOrFail($id);
        $app->name = $request['name'];
        $app->description = $request['description'];
        $app->db_name = $request['db_name'];
        $app->url_address = $request['url_address'];
        $app->url_icon = $request['url_icon'];
        $app->save();
        return redirect('apps')->with('type','blue')->with('icon','check')
        ->with('notification','Uygulama başarıyla güncellendi.');
    }
}