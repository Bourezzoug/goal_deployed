<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use App\Traits\ToastAlert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;

class PostCreate extends Component
{
    use InteractsWithBanner;
    use ToastAlert;
    use WithFileUploads;

    public $miseavant;
    public $title,$excerpt,$body,$source,$sous_categorieID,$source_link,$ordre,$publication_date,$categorieID,$video_youtube,$lien_video,$slug,$seo_title,$meta_description,$tags,$photo,$author_id,$status;

protected $listeners = ['bodyUpdated','showCreateModel','slugUpdated'];
public function slugUpdated($slug)
{
    $this->slug = $slug;
}
public function closeCreateModel(){
    $this->showCreateModel = false;
    $this->resetExcept('roles');
    $this->resetValidation();
    $this->resetErrorBag();
}

public function mount() {
    $this->status = "Publié";
}

public bool $showCreateModel = false;

public function showCreateModel(){
    $this->showCreateModel = true;
}
    protected function rules()
    {
        
    $rules =  [
        'title'                 =>  ['required', 'string', 'max:255', 'min:5',Rule::unique(Post::class)],
        'excerpt'               =>  ['required', 'string','min:10'],
        'body'                  =>  ['required', 'string'],
        'source'                =>  ['required', 'string', 'max:50', ],
        'source_link'           =>  ['required', 'string', 'max:255', ],
        'ordre'                 =>  ['nullable', 'integer'],
        'categorieID'           =>  ['required','integer'],
        'video_youtube'         =>  ['nullable','boolean'],
        'lien_video'            =>  ['nullable','string','max:255', ],
        'slug'                  =>  ['required','string','max:255', 'min:5'],
        'seo_title'             =>  ['nullable','string','max:255', 'min:5'],
        'tags'                  =>  ['nullable','string','max:255', 'min:5'],
        'meta_description'      =>  ['nullable','string', 'min:5'],
        'photo'                 =>  'required|image|mimes:jpeg,png,jpg,webp',
        'status'                =>  ['required', 'string', 'max:50'],
        'miseavant'             =>  ['nullable','boolean'],
    ];
    if ($this->status !== 'En_attente') {
        $rules['publication_date'] = 'nullable|date';
    } else {
        $rules['publication_date'] = 'required|date';
    }
    
    if ($this->categorieID == 8) {
        $rules['sous_categorieID'] = ['required', 'integer'];
    }
    
    if ($this->categorieID == 6) {
        $rules['excerpt'] = ['nullable'];
        $rules['body'] = ['nullable'];
    }
    return $rules;
    }
    public function bodyUpdated($value)
{
    $this->body = $value;
}
    public function create(){
        $this->validate();
        $publicationDate = date('Y-m-d H:i:s', strtotime($this->publication_date));
        $lien_video = $this->video_youtube == 1 ? 'https://www.youtube.com/embed/'.$this->lien_video : $this->lien_video;
        if ($this->categorieID != 8) {
            $category_id = $this->categorieID;
        } else {
            $category_id = $this->sous_categorieID;
        }
        $data = [
            'title'             =>  $this->title ,
            'author_id'         =>  Auth::id(),
            'excerpt'           =>  $this->excerpt,
            'body'              =>  $this->body,
            'source'            =>  $this->source,
            'source_link'       =>  $this->source_link,
            'ordre'             =>  $this->ordre,
            'category_id'       =>  $category_id,
            'video_youtube'     =>  $this->video_youtube,
            'lien_video'        =>  $lien_video,
            'slug'              =>  $this->slug,
            'mise_avant'        =>  $this->miseavant,
            'seo_title'         =>  $this->seo_title,
            'tags'              =>  $this->tags,
            'meta_description'  =>  $this->meta_description,
            'status'            =>  $this->status,
            'image'             =>  $this->photo,
        ];
        if(!empty($this->publication_date)) {
            $data['publication_date'] =  $publicationDate;
        }

// Set the 'ordre' of the new post to 1
$data['ordre'] = 1;

// Increment the 'ordre' for all existing posts by 1
Post::whereNotNull('ordre')->update(['ordre' => DB::raw('ordre + 1')]);

// Insert the new post with 'ordre' = 1
// Post::create($data);



        // if (!empty($this->photo)) {
        //     $url = $this->photo->store('files/1/posts','public');
        //     $data['image'] = '/storage/' . $url;
        // }
        if (!empty($this->photo)) {
            $img = Image::make($this->photo);
            $upload_path = public_path('storage/files/1/posts') . DIRECTORY_SEPARATOR;
            $filename = $this->photo->getClientOriginalName();
            $img->save($upload_path . $filename);
            $data['image'] = '/storage/files/1/posts/' . $filename;
            
        }

        $existingPost = Post::where('mise_avant', 1)
                    ->whereDate('created_at', today())
                    ->first();

        if ($existingPost) {
            $data['mise_avant'] = 0; // set mise_avant to 0 for the new post
            return back()->with('alert_error', 'Vous avez déjà un alert aujourd\'hui');
        }


        Post::create($data);
        $this->closeCreateModel();
        $this->banner('Un article a été crée');
        $this->emit('refreshParent');
        return redirect()->route('admin.post.index');
    }



    public function render()
    {
        $categories = Category::where('parent_id', null)->pluck('name', 'id');
        $sous_categories = [];
    
        if ($this->categorieID) {
            $sous_categories = Category::where('parent_id', $this->categorieID)->pluck('name', 'id');
        }
    
        return view('livewire.admin.post.post-create', [
            'categories' => $categories,
            'sous_categories' => $sous_categories,
        ]);
    }
}
