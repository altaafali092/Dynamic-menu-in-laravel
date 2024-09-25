 @extends('layouts.master')
 @section('content')
     <div>
         <a href="{{ route('menu.create') }}" class="uk-button uk-button-danger">Create Menu</a>


         <div class="container mx-auto mt-10">
             <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                 <table class="uk-table uk-table-striped">
                     <thead>
                         <tr>
                             <th>S. No</th>
                             <th>Menu Name</th>
                             <th>Parent Menu</th>
                             <th>Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($menus as $menu)
                             <tr>
                                 <!-- Display serial number -->
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $menu->name }}</td>
                                 <td>{{ $menu->parent ? $menu->parent->name : 'None' }}</td>
                                 <td class="uk-flex uk-grid-small">
                                     <a href="{{ route('menu.edit', $menu) }}"
                                     class="uk-button uk-button-primary">Edit</a>

                                     <form action="{{ route('menu.destroy', $menu) }}" method="POST">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="uk-button uk-button-danger">Delete</button>
                                     </form>
                                 </td>
                             </tr>

                             @if ($menu->children->isNotEmpty())
                                 @foreach ($menu->children as $child)
                                     <tr>
                                         <!-- Use the parent's loop index here and indent the child serial number -->
                                         <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                         <td>&nbsp;&nbsp;&nbsp;{{ $child->name }}</td>
                                         <td>{{ $menu->name }}</td>
                                         <td class="uk-flex uk-grid-small">
                                             <a href="{{ route('menu.edit', $child) }}"
                                                 class="uk-button uk-button-primary">Edit</a>


                                             <form action="{{ route('menu.destroy', $child) }}" method="POST"
                                                 class="inline">
                                                 @csrf
                                                 @method('DELETE')
                                                 <button type="submit"
                                                 class="uk-button uk-button-danger">Delete</button>
                                             </form>
                                         </td>
                                     </tr>
                                 @endforeach
                             @endif
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 @endsection
