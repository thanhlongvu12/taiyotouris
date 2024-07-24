<?php
/**
 * Created by PhpStorm.
 * User: VuThanhLong
 * Date: 11/7/2023
 * Time: 2:55 PM
 * Template Name: Hotel Search
 */
$uri = get_template_directory_uri();
get_header();
?>
<main id="category-hotel-2">
    <section class="category-hotel-1 category-hotel-2__1" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-21.png')">
        <div class="container">
            <div class="content">
                <div class="book-option">
                    <div class="item">
                        <strong>Bạn muốn đi</strong>
                        <select name="city" id="city">
                            <option value="1">Hà Nội</option>
                            <option value="1">Đà Nẵng</option>
                            <option value="1">Huế</option>
                        </select>
                    </div>
                    <div class="item">
                        <strong>Ngày đến</strong>
                        <div class="date"><input type="text" value="18 tháng 4, 2023"><i class="fal fa-calendar-alt"></i></div>
                    </div>
                    <div class="item">
                        <strong>Ngày về</strong>
                        <div class="date"><input type="text" value="20 tháng 4, 2023"><i class="fal fa-calendar-alt"></i></div>
                    </div>
                    <div class="item">
                        <strong>Số khách</strong>
                        <select name="sl" id="sl">
                            <option value="1">2 người lớn, 1 trẻ...</option>
                            <option value="1">2 người lớn, 1 trẻ...</option>
                            <option value="1">2 người lớn, 1 trẻ...</option>
                        </select>
                    </div>
                    <div class="item">
                        <button><img src="<?= $uri?>/dist/images/search.svg" alt="search">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="category-hotel-2__2" style="background-image: url('<?= $uri?>/dist/images/cate-hotel-2.png')">
        <div class="container">
            <div class="content">
                <div class="url-link">
                    <a href="#">Trang chủ</a><span>/</span><a href="#">Khách sạn</a><span>/</span><a href="#" class="current">Phú Quốc</a>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-md-3 col-left">
                            <div class="list-bar">
                                <h2>Khoảng giá</h2>
                            </div>
                            <div class="list-bar">
                                <h2>Loại khách sạn</h2>
                                <div class="list-option">
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Khách sạn</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Khu nghỉ dưỡng</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Nhà nghỉ</label></div>
                                </div>
                            </div>
                            <div class="list-bar">
                                <h2>Khu vực</h2>
                                <div class="list-option">
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Trong nước</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Quốc tế</label></div>
                                </div>
                            </div>
                            <div class="list-bar">
                                <h2>Hạng khách sạn</h2>
                                <div class="list-option">
                                    <div class="item-check item-star">
                                        <input type="checkbox" name="1" id="1">
                                        <label for="1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="item-check item-star">
                                        <input type="checkbox" name="1" id="1">
                                        <label for="1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="item-check item-star">
                                        <input type="checkbox" name="1" id="1">
                                        <label for="1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="item-check item-star">
                                        <input type="checkbox" name="1" id="1">
                                        <label for="1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                    <div class="item-check item-star">
                                        <input type="checkbox" name="1" id="1">
                                        <label for="1">
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="list-bar">
                                <h2>Địa điểm nổi bật</h2>
                                <div class="list-option">
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Vịnh Hạ Long</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Sapa</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Hội An</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Phú Quốc</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Đà Lạt</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Nha Trang</label></div>
                                    <div class="item-check"><input type="checkbox" name="1" id="1"><label for="1">Mũi Né</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-right">
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hotel-item">
                                <div class="img">
                                    <figure><img src="<?= $uri?>/dist/images/blog-1.png" alt="blog"></figure>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <h3><a href="#">InterContinental Phú Quốc Long Beach Resort</a></h3>
                                        <button class="follow"><i class="fas fa-heart"></i></button>
                                    </div>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="write"><strong>4.0 Rất tốt</strong><span>(1.27k đánh giá)</span></div>
                                    <div class="tag">
                                        <ul>
                                            <li>Phú Quốc</li>
                                            <li>Giá tốt</li>
                                            <li>Gần biển</li>
                                            <li>Luxury</li>
                                        </ul>
                                    </div>
                                    <div class="more-info">
                                        <div class="address">
                                            <div class="city"><i class="fal fa-map-marker-alt"></i>Gành Dầu, Phú Quốc, Kiên Giang</div>
                                            <p>* Chấp nhận khách sau 24h</p>
                                        </div>
                                        <div class="price">
                                            <span>Giá chỉ từ:</span>
                                            <strong>5,690,000 đ</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagra">
                                <a href="#"><i class="far fa-angle-left"></i></a>
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#" class="current">3</a>
                                <a href="#">...</a>
                                <a href="#"><i class="far fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
