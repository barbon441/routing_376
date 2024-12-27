<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{
//เก็บข้อมูลสินค้า
    private $products = [
        [
            'id' => 1,
            'name' => 'THE BODY SHOP ALMOND MILK & HONEY SOOTHING & CARING SHOWER CREAM',
            'description' => 'ครีมอาบน้ำสูตรเข้มข้น บำรุงผิวชุ่มชื่น ลดอาการคันจากผิวแห้ง ส่วนผสมจากนมอัลมอนด์ และน้ำผึ้ง',
            'price' => 5 ,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/THE-BODY-SHOP-ALMOND-MILK-HONEY-SOOTHING-CARING-SHOWER-CREAM-250ml.jpg'

        ],
        [
            'id' => 2,
            'name' => 'Vaseline ครีมอาบน้ำ เฮลท์ตี้ ไวท์ ชมพู',
            'description' => 'ทำความสะอาดผิวพร้อมปรับสภาพผิวให้ขาวกระจ่างใส ผิวใสสดชื่น สุขภาพดี',
            'price' => 6 ,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-Vaseline-%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-%E0%B9%80%E0%B8%AE%E0%B8%A5%E0%B8%97%E0%B9%8C%E0%B8%95%E0%B8%B5%E0%B9%89-%E0%B9%84%E0%B8%A7%E0%B8%97%E0%B9%8C-%E0%B8%8A%E0%B8%A1%E0%B8%9E%E0%B8%B9-450-%E0%B8%A1%E0%B8%A5.jpg'
        ],
        [
            'id' => 3,
            'name' => 'SHOKUBUTSU ครีมอาบน้ำ โชกุบุสซึ โมโนกาตาริ',
            'description' => 'ส่วนผสม 99% จากพืชธรรมชาติ อุดมด้วยโปรตีน บำรุงผิวให้เนียนนุ่มชุ่มชื่น พร้อมเก็บกักความชุ่มชื้น',
            'price' => 10 ,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-SHOKUBUTSU-%E0%B9%82%E0%B8%A1%E0%B9%82%E0%B8%99%E0%B8%81%E0%B8%B2%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B4.jpg'
        ],
        [
            'id' => 4,
            'name' => 'โดฟ ดีพลี่ นอริชชิ่ง ครีมอาบน้ำ',
            'description' => 'ครีมอาบน้ำสูตรเข้มข้น เทคโนโลยี Noutrium MoistureTM บำรุงล้ำลึก พร้อมกักเก็บความชุ่มชื่น',
            'price' => 4,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-%E0%B9%82%E0%B8%94%E0%B8%9F-%E0%B8%94%E0%B8%B5%E0%B8%9E%E0%B8%A5%E0%B8%B5%E0%B9%88-%E0%B8%99%E0%B8%AD%E0%B8%A3%E0%B8%B4%E0%B8%8A%E0%B8%8A%E0%B8%B4%E0%B9%88%E0%B8%87-1000-%E0%B8%A1%E0%B8%A5.jpg'
        ],
        [
            'id' => 5,
            'name' => 'Lux Botanical Skin Rebalance',
            'description' => 'สารสกัดจากธรรมชาติ ปรับสมดุลผิว ผิวชุ่มชื่นกระจ่างใส ผิวแพ้ง่ายสามารถใช้ได้',
            'price' => 6,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-Lux-Botanical-Skin-Rebalance-450.jpg'
        ],
        [
            'id' => 6,
            'name' => 'เดทตอล ออนเซ็น สบู่เหลวอาบน้ำ สูตรดีท็อกซ์ซิฟายอิ้ง',
            'description' => 'ผิวสะอาดสดชื่นอย่างมีอนามัย ลดการสะสมของแบคทีเรีย 99.9% บำรุงผิวให้นุ่มชุ่มชื่น สุขภาพดี',
            'price' => 8,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-%E0%B9%80%E0%B8%94%E0%B8%97%E0%B8%95%E0%B8%AD%E0%B8%A5-%E0%B8%AD%E0%B8%AD%E0%B8%99%E0%B9%80%E0%B8%8B%E0%B9%87%E0%B8%99-%E0%B8%AA%E0%B8%9A%E0%B8%B9%E0%B9%88%E0%B9%80%E0%B8%AB%E0%B8%A5%E0%B8%A7%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-%E0%B8%AA%E0%B8%B9%E0%B8%95%E0%B8%A3%E0%B8%94%E0%B8%B5%E0%B8%97%E0%B9%87%E0%B8%AD%E0%B8%81%E0%B8%8B%E0%B9%8C%E0%B8%8B%E0%B8%B4%E0%B8%9F%E0%B8%B2%E0%B8%A2%E0%B8%AD%E0%B8%B4%E0%B9%89%E0%B8%87-500-.jpg'
        ],
        [
            'id' => 7,
            'name' => 'Parrot Botanicals Shower Cream Unique Botanical',
            'description' => 'กลิ่นหอมดอกไม้ไทยเป็นเอกลักษณ์ ทำความสะอาดผิวอย่างหมดจด บำรุงผิวให้เนียนนุ่ม',
            'price' => 11,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-Parrot-Botanicals-Shower-Cream-Unique-Botanical-l.jpg'
        ],
        [
            'id' => 8,
            'name' => 'โพรเทคส์ พรอพโพลิส',
            'description' => 'สารสกัดแฟลกซ์ซีด ออยล์ ชำละล้างแบคทีเรีย ผสานสารสกัดพรอพโพลิส บำรุงผิวให้ชุ่มชื่น',
            'price' => 9,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-%E0%B9%82%E0%B8%9E%E0%B8%A3%E0%B9%80%E0%B8%97%E0%B8%84%E0%B8%AA%E0%B9%8C-%E0%B8%9E%E0%B8%A3%E0%B8%AD%E0%B8%9E%E0%B9%82%E0%B8%9E%E0%B8%A5%E0%B8%B4%E0%B8%AA-450.jpg'
        ],
        [
            'id' => 9,
            'name' => 'ครีมอาบน้ำ BENICE Peach Love Peony Shower Gel',
            'description' => 'สารสกัดดอกพีโอนี บำรุงผิวให้นุ่มชุ่มชื่น คอลลาเจนเปปไทด์ ผิวยืดหยุ่น ฉ่ำ เด้งกระชับ',
            'price' => 4,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-BENICE-Peach-Love-Peony-Shower-Gel-%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3.jpg'

        ],
        [
            'id' => 10,
            'name' => 'Care ครีมอาบน้ำ ซากุระ',
            'description' => 'ผิวสะอาดเนียนนุ่ม หอมกลิ่นดอกซากุระ อ่อนโยนต่อผิวบอบบางแพ้ง่าย ปราศจากส่วนผสมของสบู่',
            'price' => 8,
            'images' => 'https://www.top10.in.th/wp-content/uploads/2021/10/%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-Care-%E0%B9%81%E0%B8%84%E0%B8%A3%E0%B9%8C-%E0%B8%84%E0%B8%A3%E0%B8%B5%E0%B8%A1%E0%B8%AD%E0%B8%B2%E0%B8%9A%E0%B8%99%E0%B9%89%E0%B8%B3-%E0%B8%8B%E0%B8%B2%E0%B8%81%E0%B8%B8%E0%B8%A3%E0%B8%B0.jpg'
        ],
    ];



    /**
     * Display a listing of the resource.
     * แสดงสินค้าทั้งหมด
     */
    public function index()
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *แสดงรายละเอียดสินค้า
     */
    public function show(string $id)
    {
        $product = collect($this->products)->firstWhere('id', $id);//ค้นหาสินค้าที่ตรงกับid

        if (!$product) {
        abort(404, 'Product not found');
    }
        return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
