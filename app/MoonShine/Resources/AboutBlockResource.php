<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\AboutBlock;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Switcher;

/**
 * @extends ModelResource<AboutBlock>
 */
class AboutBlockResource extends ModelResource
{
    protected string $model = AboutBlock::class;

    protected string $title = 'Блоки About';
    protected string $column = 'title';

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
            Image::make(__('Картинка'), 'image'),
            Text::make('Отображать главным', 'is_main_text')->sortable('is_main')
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [

            ID::make(),
            Text::make('Заголовок', 'title')->required(),

            Textarea::make('Текст', 'text')
                ->required(),


            Image::make('Изображение', 'image')
                ->dir('about')
                ->disk('public')
                ->allowedExtensions(['jpg', 'png', 'jpeg', 'webp', 'svg'])
                ->removable(),
            Switcher::make('Главный блок', 'is_main')->default(false)->updateOnPreview()->hint('Только один блок будет отображен главным'),
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
                ->dir('about')
                ->disk('public'),
            Textarea::make('Текст', 'text'),
            Text::make('Отображать главным', 'is_main_text')->sortable('is_main')
        ];
    }



    /**
     * @param AboutBlock $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => [
                'nullable',
                'file',
                'mimetypes:image/jpeg,image/png,image/webp,image/svg+xml',
                'max:2048'
            ]

        ];
    }

    protected function isImageRemoved(): bool
    {
        $hiddenImage = request()->input('hidden_image');
        return empty($hiddenImage) && !request()->hasFile('image');
    }


    public function validationMessages(): array
    {
        return [
            'image.mimes' => 'Допустимые форматы изображений: jpg, jpeg, png, webp,svg',
            'image.max' => 'Максимальный размер изображения — 2 МБ',
        ];
    }
}
