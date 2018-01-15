<button class="btn btn-success" data-toggle="modal" data-target="#createProduct"><span class="fa fa-plus"></span> Nieuw product</button>

<table id="producten" class="display" width="100%" cellspacing="0">
</table>


<!-- Create product Modal -->
<div id="createProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nieuw product toevoegen</h4>
      </div>
      <div class="modal-body">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <form id="formCreateProduct" method="post">
                <!-- text input -->
                <div class="form-group">
                  <label>Merk</label>
                  <input class="form-control" class="merk" name="brand" placeholder="Merk" type="text">
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <input class="form-control" class="type" name="type" placeholder="Type" type="text">
                </div>
                <div class="form-group">
                  <label>Titel</label>
                  <input class="form-control" class="title" name="titel" placeholder="Titel" type="text">
                </div>
                <div class="form-group">
                  <label>Beschrijving</label>
                  <input class="form-control" class="description" name="beschrijving" placeholder="Beschrijving" type="text">
                </div>
                <div class="form-group">
                  <label>Prijs</label>
                  <input class="form-control" class="price" name="prijs" placeholder="Prijs" type="number" min="1">
                </div>
                <button class="btn btn-success submit" type="submit">Verzenden</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Create product Modal -->
<div id="editProduct" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Product bewerken</h4>
      </div>
      <div class="modal-body">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <form id="formEditProduct" method="post">
                <input class="hidden-id" name="id" hidden="">
                <!-- text input -->
                <div class="form-group">
                  <label>Merk</label>
                  <input class="form-control merk" name="brand" placeholder="Merk" type="text">
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <input class="form-control type" name="type" placeholder="Type" type="text">
                </div>
                <div class="form-group">
                  <label>Titel</label>
                  <input class="form-control title" name="titel" placeholder="Titel" type="text">
                </div>
                <div class="form-group">
                  <label>Beschrijving</label>
                  <input class="form-control description" name="beschrijving" placeholder="Beschrijving" type="text">
                </div>
                <div class="form-group">
                  <label>Prijs</label>
                  <input class="form-control price" name="prijs" placeholder="Prijs" type="number" min="1">
                </div>
                <button class="btn btn-success editProduct" type="submit">Wijzigen</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger deleteProduct"><span class="fa fa-trash"></span> Verwijderen</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>