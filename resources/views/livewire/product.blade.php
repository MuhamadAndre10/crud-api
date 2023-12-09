<div>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Asset</h2>
        </div>

        <div class="col-md-6">
            @if ($showFrom)
                <a href="#" class="btn btn-secondary float-end" wire:click.prevent="hide">Close</a>
            @else
                <a href="#" class="btn btn-primary float-end" wire:click="show">Tambah Item</a>
            @endif
        </div>
    </div>

    @if ($showFrom)
        <div class="card p-5 mb-5">

            <form wire:submit.prevent="store" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Poduct</label>
                            <input wire:model="product_name" type="text" class="form-control" id="name"
                                name="product_name">
                        </div>
                        <div class="mb-3">
                            <label for="merk" class="form-label">Merek</label>
                            <input wire:model="brand" type="text" class="form-control" id="merk" name="merk">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Produk</label>
                            <input wire:model="image" type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input wire:model="Amount" type="number" class="form-control" placeholder="Harga Beli"
                                name="amount">
                        </div>
                        <div class="mb-3">
                            <label for="date_transaction" class="form-label">Tanggal Beli</label>
                            <input wire:model="TransactionDate" type="date" class="form-control"
                                id="date_transaction" name="date_transaction">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Deskripsi</label>
                            <textarea wire:model="description" type="text" class="form-control" id="desc" name="description"> </textarea>
                        </div>

                    </div>
                </div>



                @if ($editMode)
                    <button class="btn btn-primary" wire:click="update">Update</button>
                @else
                    <button type="submit" class="btn btn-primary">Create</button>
                @endif

                <a href="#" class="btn btn-secondary" wire:click="hide">Cancel</a>


            </form>
        </div>
    @endif



    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Merek</th>
                <th scope="col">Harga beli</th>
                <th scope="col">Tanggal beli</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        @foreach ($products as $key => $product)
            <tbody>
                <tr>
                    <th scope="row">{{ $products->firstItem() + $key }}</th>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->Amount }}</td>
                    <td>{{ $product->TransactionDate }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm"
                            wire:click="detail({{ $product->id }})">Detail</a>
                        <a href="" class="btn btn-info btn-sm">Update</a>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>


    {{ $products->links() }}

</div>
