<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\WithFileUploads;
use App\Traits\ToastAlert;
use Illuminate\Validation\Rule;

class PostUpdate extends Component
{

    use InteractsWithBanner;
    use ToastAlert;
    use WithFileUploads;
    public $itemId;
    public $miseavant;
    public $title,$excerpt,$body,$source,$sous_category_id,$source_link,$ordre,$publication_date,$category_id,$video_youtube,$lien_video,$slug,$seo_title,$meta_description,$tags,$image,$image_path,$author_id,$status;
    // public $sous_categories ;
    protected $listeners = ['bodyUpdated','showUpdateModel'];
    public bool $showUpdateModel = false;

    public function bodyUpdated($value)
    {
        $this->body = $value;
    }

    protected function rules()
    {
        return [
            'title'                 =>  ['required', 'string', 'max:255', 'min:5'],
            'excerpt'               =>  ['required', 'string','min:5'],
            'body'                  =>  ['required', 'string'],
            'source'                =>  ['required', 'string', 'max:50', ],
            'source_link'           =>  ['required', 'string', 'max:255', 'min:5'],
            'ordre'                 =>  ['nullable', 'integer'],
            'category_id'           =>  'required|integer|exists:App\Models\Category,id',
            'video_youtube'         =>  ['nullable','boolean'],
            'lien_video'            =>  ['nullable','string','max:255', 'min:5'],
            'slug'                  =>  ['required','string','max:255', 'min:5'],
            'seo_title'             =>  ['nullable','string','max:255', 'min:5'],
            'tags'                  =>  ['nullable','string','max:255', 'min:5'],
            'meta_description'      =>  ['nullable','string','max:255', 'min:5'],
            'image'                 =>  'nullable|image|mimes:jpeg,png,jpg,webp',
            'status'                =>  ['required', 'string', 'max:50', 'min:5'],
            'publication_date'      =>  'date|nullable'
        ];
    }




    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Post::find($this->itemId);
            $parentCategory = Category::where('id', $item->category->parent_id)->first();
            $this->title = $item->title;
            $this->excerpt = $item->excerpt;
            $this->body = $item->body;
            $this->source = $item->source;
            $this->source_link = $item->source_link;
            $this->ordre = $item->ordre;
            $this->category_id = $parentCategory ? $parentCategory->id : $item->category_id;
            $this->sous_category_id = $parentCategory ? $item->category_id : null;
            $this->video_youtube = $item->video_youtube;
            $this->lien_video = $item->lien_video;
            $this->slug = $item->slug;
            $this->seo_title = $item->seo_title;
            $this->tags = $item->tags;
            $this->meta_description = $item->meta_description;
            $this->image_path = $item->image;
            $this->publication_date = $item->publicationDate;
            $this->status = $item->status;
            $this->miseavant = $item->mise_avant;
            // $this->dispatchBrowserEvent('updateBody', $this->body);
            // dd($this->body);
            $this->emit('updateBody', $this->body);
        }
        // dd($this->sous_categories);
    }
    // public function mount() {
    //     $item = Post::find($this->itemId);
    //     $this->body = $item->body;
    // }


    public function edit(){
        $this->validate();
        if ($this->category_id != 8) {
            $category_id = $this->category_id;
        } else {
            $category_id = $this->sous_category_id;
        }
        $publicationDate = date('Y-m-d H:i:s', strtotime($this->publication_date));
        $lien_video = $this->video_youtube == 1 ? 'https://www.youtube.com/embed/'.$this->lien_video : $this->lien_video;
        $this->slug = str_replace(' ', '-', $this->slug);
        $data = [
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'source' => $this->source,
            'source_link' => $this->source_link,
            'ordre' => $this->ordre,
            'category_id' =>  $category_id ,
            'video_youtube' => $this->video_youtube,
            'lien_video' => $lien_video,
            'slug' => $this->slug,
            'seo_title' => $this->seo_title,
            'tags' => $this->tags,
            'meta_description' => $this->meta_description,
            'publication_date' => $publicationDate,
            'status' => $this->status,
            'mise_avant' => $this->miseavant,
        ];

        if (!empty($this->image)) {
            $url = $this->image->store('files/1/posts', 'public');
            $data['image'] = '/storage/' . $url;
        }


        Post::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->toast(__('Information d\'article ont été mis à jour'));
        $this->emit('refreshParent');
        // dd($this->itemId);
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        $sous_categories = [];
        // if ($this->category_id) {
            $category = Category::find($this->category_id);
            // if ($category->count() > 0) {
                $sous_categories = $this->category_id ? Category::where('parent_id', $this->category_id)->pluck('name', 'id') : [];
            // }
        // }
    
        return view('livewire.admin.post.post-update', [
            'categories' => $categories,
            'sous_categories' => $sous_categories,
        ]);
    }
}
