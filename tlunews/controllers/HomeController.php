<?php
class HomeController {
    // Hiển thị danh sách tin tức
    public function index() {
        $news = News::getAll(); // Lấy danh sách tin tức từ model News
        include "views/home/index.php"; // Hiển thị giao diện danh sách tin tức
    }

    // Hiển thị chi tiết tin tức
    public function detail($id) {
        $news = News::getById($id); // Lấy thông tin tin tức theo ID
        include "views/news/detail.php"; // Hiển thị giao diện chi tiết tin tức
    }

    // Tìm kiếm tin tức
    public function search() {
        $keyword = $_GET['keyword'] ?? ''; // Lấy từ khóa tìm kiếm
        $news = News::searchByKeyword($keyword); // Tìm kiếm tin tức theo từ khóa
        include "views/home/index.php"; // Hiển thị giao diện danh sách tin tức
    }
}
