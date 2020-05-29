<div class="slider-wrap">
  <div class="container">
    <div class="sliderTxt">
      <p><?php echo $info['slider_text1'];?></p>
      <h1><?php echo $info['slider_text2'];?></h1>
      <div class="form-wrap">
        <form action="<?=base_url('vacancies/vacancy_search');?>" role='search' method='get'>
          <label for="category" style="color:white;">Kateqoriyalar üzrə iş axtar</label>
          <div class="row">
            <div class="col-md-10">
              <div class="input-group">
                <select name="search" class="form-control">
                  <?php $category = category(); foreach ($category as $category): ?>
                      <optgroup label="<?=$category['cat_name'];?>">
                         <?php $sub_cat = sub_cat($category['id']); foreach ($sub_cat as $info): ?>
                            <option value="<?=$info['id'];?>"> - <?=$info['sub_cat_name'];?></option>
                         <?php endforeach ?>
                      </optgroup>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="input-btn">
                <input type="submit" class="sbutn" value="Axtar">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>