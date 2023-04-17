<div class="slider-container">
    <div class="slider">
        <div class="gallery">
            <img class="banner-img" src="<?=isset($banners[0]) ? $banners[0] : ""?>" alt="First image">
            <img class="banner-img" src="<?=isset($banners[1]) ? $banners[1] : ""?>" alt="Second image">
            <img class="banner-img" src="<?=isset($banners[2]) ? $banners[2] : ""?>" alt="Third image">
            <img class="banner-img" src="<?=isset($banners[3]) ? $banners[3] : ""?>" alt="Fourth image">
            <img class="banner-img" src="<?=isset($banners[4]) ? $banners[4] : ""?>" alt="Fifth image">
        </div>
        <div class="controls">
            <button class="prev"></button>
            <button class="next"></button>
        </div>
    </div>
</div>