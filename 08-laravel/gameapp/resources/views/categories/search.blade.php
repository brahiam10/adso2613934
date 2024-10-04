@forelse ($categories as $category)
<div class="form-group">
                    <label>
                        <img class="users-picture" src="{{ asset('images/' . $category->image) }}" alt="user-photo">
                        <p class="gere-add">
                            {{ $category->name }}
                        </p>
                        <div class="actions">
                            <a href="{{ route('users.show', $category->id) }}" class="edit">
                                <img src="images/busc.svg" alt="">
                            </a>
                            <a href="{{ url('users/' . $category->id . '/edit') }}" class="edit">
                                <img src="images/lapiz.svg" alt="">
                            </a>
                            <a href="javascript:;" class="btn-delete" data-fullname="{{ $category->name }}">
                                <img src="images/elimina.svg" alt="">
                            </a>
                            <form action="{{ url('users/'. $category->id) }}" method="post" style="display:none">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </label>
                </div>

@empty
    No found 🤒
@endforelse