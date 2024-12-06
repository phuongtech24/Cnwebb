<?php
class NewsController {
    public function detail($id) {
        $news = News::getById($id); // Lấy thông tin tin tức theo ID
        include "views/news/detail.php"; // Hiển thị giao diện chi tiết tin tức
    }
}
