<?php

$mode = $_GET['view']; // $mode = add / edit
$form_title = ($mode == 'add' ? 'Добавление' : 'Редактирование');
$form_action = WATER_STEPS_PLUGIN_ADMIN_URL . '&action=add';

if ($mode == 'edit')
	$form_action = WATER_STEPS_PLUGIN_ADMIN_URL . '&action=edit';

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= $form_title ?> этап</h1>
	<a href="<?= WATER_STEPS_PLUGIN_ADMIN_URL ?>" class="page-title-action">← Назад</a>

	<form method="post" action="<?= $form_action ?>" novalidate="novalidate">
		<?php if ($mode == 'edit'): ?>
			<input type="hidden" name="data_id" value="<?= self::$model->id ?>" >
		<?php endif ?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="icon">Иконка</label>
					</th>
					<td>
						<input name="data_icon" type="text" id="icon" value="<?= self::$model->icon ?>" class="regular-text">
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="title">Заголовок</label>
					</th>
					<td>
						<input name="data_title" type="text" id="title" value="<?= self::$model->title?>" class="regular-text">
					</td>
				</tr>			
				<th scope="row">
						<label for="text">Текст</label>
					</th>
					<td>
						<textarea name="data_text" type="text" id="text" class="regular-text"><?= self::$model->text ?></textarea>
					</td>
				</tr>	
								
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button button-primary" value="Сохранить изменения">
		</p>
	</form>

</div>