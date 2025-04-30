<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UploadCsvController extends Controller
{
    public function index()
    {
        return view('admin.bulkupload');
    }

    public function uploadCsv(Request $request)
    {
        if ($request->ajax()) {
            $file = $request->file('upload_file');
            if (($open = fopen($file->getRealPath(), "r")) !== FALSE) {
                $r = 0;
                while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
                    if ($r > 0) {
                        $data = new Product();
                        $data->product_name = $row[0];
                        $data->product_slug = $row[1];
                        $data->sku = $row[2];
                        $data->subcategory_id = $row[3];
                        $data->product_image = $row[4];
                        $data->product_shortdesc = $row[5];
                        $data->product_desc = $row[6];
                        $data->keyword = $row[7];
                        $data->technical_specification = $row[8];
                        $data->price = $row[9];
                        $data->mrp = $row[10];
                        $data->is_trending = $row[11];
                        $data->is_top = $row[12];
                        $data->is_promo = $row[13];
                        $data->tax = $row[14];
                    }
                    $r++;
                }
            }
            $returnData = ["status" => "sucess", "msg" => "Product is Uploaded Sucessfully"];
            return response()->json($returnData);
        }
    }
}
