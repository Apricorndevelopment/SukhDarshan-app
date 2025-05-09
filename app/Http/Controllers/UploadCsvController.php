<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Companylogo;
use Illuminate\Support\Facades\File;
use ZipArchive;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Support\Str;


class UploadCsvController extends Controller
{
    public function index()
    {
        $logo = Companylogo::first();
        return view('admin.bulkupload', compact('logo'));
    }
    // main
    // public function uploadCsv(Request $request)
    // {
    //     $successCount = 0;
    //     $failCount = 0;

    //     // Handle ZIP extraction
    //     $extractedPath = public_path('productimages/bulk');
    //     if ($request->hasFile('image_zip')) {
    //         $zip = new ZipArchive;
    //         $zipFile = $request->file('image_zip');
    //         $zipPath = storage_path('app/temp_image.zip');

    //         $zipFile->move(storage_path(), 'temp_image.zip');

    //         if ($zip->open($zipPath) === TRUE) {
    //             // Clear old extracted files if needed
    //             File::cleanDirectory($extractedPath);
    //             $zip->extractTo($extractedPath);
    //             $zip->close();
    //         } else {
    //             return response()->json(['status' => 'error', 'msg' => 'Failed to extract ZIP file.']);
    //         }
    //     }

    //     // Handle CSV processing
    //     if ($request->hasFile('product_file')) {
    //         $file = $request->file('product_file');
    //         if (($open = fopen($file->getRealPath(), "r")) !== FALSE) {
    //             $r = 0;
    //             while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
    //                 if ($r > 0 && count($row) >= 15) {
    //                     $data = new Product();

    //                     $data->product_name = trim($row[0]);
    //                     $data->product_slug = trim($row[1]);
    //                     $data->sku = trim($row[2]);

    //                     // Find subcategory
    //                     $subcategoryName = trim($row[3]);
    //                     $subcategory = Subcategory::where('subcategory_name', $subcategoryName)->first();

    //                     if (!$subcategory) {
    //                         \Log::error("❌ Subcategory not found: " . $subcategoryName);
    //                         $failCount++;
    //                         continue;
    //                     }

    //                     $data->subcategory_id = $subcategory->id;

    //                     // Handle image file
    //                     $imageFileName = trim($row[4]);
    //                     $sourceImagePath = $extractedPath . '/' . $imageFileName; // Fix image path here

    //                     // Log image path for debugging
    //                     \Log::error("Image path being checked: $sourceImagePath");

    //                     if (File::exists($sourceImagePath)) {
    //                         // Generate a unique name for the image to avoid conflicts
    //                         $newFileName = time() . '_' . $imageFileName;
    //                         $destinationPath = public_path('uploads/products/' . $newFileName); // Destination for image
    //                         File::copy($sourceImagePath, $destinationPath); // Copy the image to destination
    //                         $data->product_image = 'uploads/products/' . $newFileName; // Save image path in database
    //                     } else {
    //                         \Log::error("❌ Image file not found: $sourceImagePath");
    //                     }

    //                     $data->product_shortdesc = trim($row[5]);
    //                     $data->product_desc = trim($row[6]);
    //                     $data->keyword = trim($row[7]);
    //                     $data->technical_specification = trim($row[8]);
    //                     $data->price = floatval($row[9]);
    //                     $data->mrp = floatval($row[10]);
    //                     $data->is_trending = strtolower(trim($row[11])) === 'yes' ? 1 : 0;
    //                     $data->is_top = strtolower(trim($row[12])) === 'yes' ? 1 : 0;
    //                     $data->is_promo = strtolower(trim($row[13])) === 'yes' ? 1 : 0;
    //                     $data->tax = floatval($row[14]);

    //                     $data->save();
    //                     $successCount++;
    //                 } else {
    //                     \Log::warning("⚠️ Skipping row due to insufficient columns: " . implode(", ", $row));
    //                     $failCount++;
    //                 }
    //                 $r++;
    //             }
    //             fclose($open);
    //         }

    //         return response()->json([
    //             "status" => "success",
    //             "msg" => "Upload complete. ✅ Success: $successCount, ❌ Failed: $failCount"
    //         ]);
    //     }

    //     return response()->json(["status" => "error", "msg" => "No file uploaded."]);
    // }
    public function uploadCsv(Request $request)
    {
        $successCount = 0;
        $failCount = 0;

        // Handle ZIP extraction
        $extractedPath = public_path('productimages/bulk');
        if ($request->hasFile('image_zip')) {
            $zip = new ZipArchive;
            $zipFile = $request->file('image_zip');
            $zipPath = storage_path('app/temp_image.zip');


            $zipFile->move(storage_path(), 'temp_image.zip');

            if ($zip->open($zipPath) === TRUE) {
                // Clear old files
                File::cleanDirectory($extractedPath);
                $zip->extractTo($extractedPath);
                $zip->close();

                // Move all images from subfolders to bulk folder
                $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($extractedPath));

                foreach ($rii as $file) {
                    if (!$file->isDir()) {
                        $sourcePath = $file->getPathname();
                        $destPath = $extractedPath . '/' . $file->getFilename();
                        if ($sourcePath !== $destPath) {
                            File::move($sourcePath, $destPath);
                        }
                    }
                }

                // Delete any empty subfolders
                $directories = File::directories($extractedPath);
                foreach ($directories as $dir) {
                    File::deleteDirectory($dir);
                }
            } else {
                return response()->json(['status' => 'error', 'msg' => 'Failed to extract ZIP file.']);
            }
        }

        // Handle CSV processing
        if ($request->hasFile('product_file')) {
            $file = $request->file('product_file');
            if (($open = fopen($file->getRealPath(), "r")) !== FALSE) {
                $r = 0;
                while (($row = fgetcsv($open, 1000, ",")) !== FALSE) {
                    if ($r > 0 && count($row) >= 15) {
                        $data = new Product();

                        $data->product_name = trim($row[0]);
                        $data->product_slug = trim($row[1]);
                        $data->sku = trim($row[2]);

                        // Find subcategory
                        $subcategoryName = trim($row[3]);
                        $subcategory = Subcategory::where('subcategory_name', $subcategoryName)->first();

                        if (!$subcategory) {
                            \Log::error("❌ Subcategory not found: " . $subcategoryName);
                            $failCount++;
                            continue;
                        }

                        $data->subcategory_id = $subcategory->id;

                        // Handle image
                        $imageFileName = trim($row[4]);
                        $sourceImagePath = $extractedPath . '/' . $imageFileName;

                        \Log::error("Image path being checked: $sourceImagePath");

                        if (File::exists($sourceImagePath)) {
                            // $newFileName = time() . '_' . $imageFileName;
                            $newFileName = Str::slug($data->product_name) . '_' . uniqid() . '_' . $imageFileName;

                            $destinationPath = public_path('uploads/products/' . $newFileName);
                            File::copy($sourceImagePath, $destinationPath);
                            $data->product_image = 'uploads/products/' . $newFileName;
                        } else {
                            \Log::error("❌ Image file not found: $sourceImagePath");
                        }

                        $data->product_shortdesc = trim($row[5]);
                        $data->product_desc = trim($row[6]);
                        $data->keyword = trim($row[7]);
                        $data->technical_specification = trim($row[8]);
                        $data->price = floatval($row[9]);
                        $data->mrp = floatval($row[10]);
                        $data->is_trending = strtolower(trim($row[11])) === 'yes' ? 1 : 0;
                        $data->is_top = strtolower(trim($row[12])) === 'yes' ? 1 : 0;
                        $data->is_promo = strtolower(trim($row[13])) === 'yes' ? 1 : 0;
                        $data->tax = floatval($row[14]);

                        $data->save();
                        $successCount++;
                    } else {
                        \Log::warning("⚠️ Skipping row due to insufficient columns: " . implode(", ", $row));
                        $failCount++;
                    }
                    $r++;
                }
                fclose($open);
            }

            return response()->json([
                "status" => "success",
                "msg" => "Upload complete. ✅ Success: $successCount, ❌ Failed: $failCount"
            ]);
        }

        return response()->json(["status" => "error", "msg" => "No file uploaded."]);
    } 
}
