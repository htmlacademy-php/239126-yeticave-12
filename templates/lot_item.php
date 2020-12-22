<li class="lots__item lot">
    <div class="lot__image">
        <img src="<?= $promo_item['url'] ?? '' ?>" width="350" height="260" alt="<?= esc($promo_item['name']) ?? '' ?>">
    </div>
    <div class="lot__info">
        <span class="lot__category"><?= esc($promo_item['category']) ?? '' ?></span>
        <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= esc($promo_item['name']) ?? ''?></a></h3>
        <div class="lot__state">
            <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?=format_price(esc($promo_item['price'])) ?? '' ?></span>
            </div>
            <div class="lot__timer timer <?=is_timer_finishing($promo_item['expiry_date']); ?>">
                <?=timer_counter($promo_item['expiry_date']); ?>
            </div>
        </div>
    </div>
</li>
