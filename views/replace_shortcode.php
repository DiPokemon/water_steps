<div class="steps_wrapper steps_wrapper-slider">
    <?php foreach ( self::$model->get_list() as $item ): ?>
            <div class="step_item">
                <div class="step_half">
                    <div class="step_icon">
                        <i aria-hidden="true" class="<?= $item->icon ?>"></i>
                    </div>
                    <div class="step_title">
                        <?= $item->title ?>
                    </div>
                </div>
                <div class="step_half">
                    <div class="step_text">
                        <?= $item->title ?>
                    </div>
                </div>
            </div>
    <?php endforeach ?>
</div>