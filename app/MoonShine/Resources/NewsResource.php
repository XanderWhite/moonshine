<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Textarea;
use MoonShine\Decorations\Block;

/**
 * @extends ModelResource<News>
 */
class NewsResource extends ModelResource
{
	protected string $model = News::class;

	protected string $title = 'Новости';

	protected string $column = 'title';


	protected bool $createInModal = true;

	protected bool $detailInModal = true;

	protected bool $editInModal = true;


	public function getTitle(): string
	{
		return __($this->title);
	}


	/**
	 * @return list<FieldContract>
	 */
	protected function indexFields(): iterable
	{
		return [
			ID::make()->sortable(),
			Text::make(__('Название'), 'title')->sortable(),
			Date::make(__('Дата'), 'date')->format('d.m.Y')->sortable(),
			Image::make(__('Картинка'), 'image'),
		];
	}

	/**
	 * @return list<ComponentContract|FieldContract>
	 */
	protected function formFields(): iterable
	{
		return [
			ID::make()
				->sortable(),

			Text::make('Заголовок', 'title')
				->required(),


			Date::make('Дата', 'date')
				->format('d.m.Y')
				->required(),

			Textarea::make('Анонс', 'announce'),

			Textarea::make('Содержание', 'content')
				->required(),

			Image::make('Изображение', 'image')
				->dir('news')
				->disk('public')
				->allowedExtensions(['jpg', 'png', 'jpeg', 'webp'])
				->removable()
		];
	}

	/**
	 * @return list<FieldContract>
	 */
	protected function detailFields(): iterable
	{
		return [
			ID::make(),
			Text::make('Заголовок', 'title'),
			Image::make('Изображение', 'image')
				->dir('news')
				->disk('public'),
			Date::make('Дата', 'date')->format('d.m.Y'),
			Textarea::make('Анонс', 'announce'),
			Textarea::make('Содержание', 'content')
		];
	}

	/**
	 * @param News $item
	 *
	 * @return array<string, string[]|string>
	 * @see https://laravel.com/docs/validation#available-validation-rules
	 */
	protected function rules(mixed $item): array
	{
		return [
			'title' => 'required|string|max:255',
			'date' => 'required|date',
			'announce' => 'required|string',
			'content' => 'required|string',
			'image' => [
				($item->exists && !request()->hasFile('image') && !$this->isImageRemoved())
					? 'nullable'
					: 'required',
				'image',
				'mimes:jpg,jpeg,png,webp',
				'max:2048'
			]
		];
	}

	protected function isImageRemoved(): bool
	{
		$hiddenImage = request()->input('hidden_image');
		$imageRemoved = empty($hiddenImage) && !request()->hasFile('image');

		return $imageRemoved;
	}

	public function validationMessages(): array
	{
		return [
			'image.required' => 'Пожалуйста, выберите изображение для новости',
			'image.image' => 'Загружаемый файл должен быть изображением',
			'image.mimes' => 'Допустимые форматы изображений: jpg, jpeg, png, webp',
			'image.max' => 'Максимальный размер изображения — 2 МБ',
		];
	}
}
