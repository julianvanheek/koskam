<button class="btn btn-success" data-toggle="modal" data-target="#createCompany"><span class="fa fa-plus"></span> Nieuw bedrijf</button>

<table id="bedrijven" class="display" width="100%" cellspacing="0">
</table>


<!-- Create company Modal -->
<div id="createCompany" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nieuw bedrijf toevoegen</h4>
      </div>
      <div class="modal-body">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <form id="formCreateCompany" method="post">
                <!-- text input -->
                <div class="form-group">
                  <label>Naam</label>
                  <input class="form-control" name="naam" placeholder="Naam" type="text">
                </div>
                <div class="form-group">
                  <label>KvK</label>
                  <input class="form-control" name="kvk" placeholder="KvK" type="text">
                </div>
                <div class="form-group">
                  <label>Eigenaar</label>
                  <input class="form-control" name="eigenaar" placeholder="Eigenaar" type="text">
                </div>
                <div class="form-group">
                  <label>Bezorg adres</label>
                  <input class="form-control" name="adres" placeholder="Bezorg adres" type="text">
                </div>
                <div class="form-group">
                  <label>Postcode</label>
                  <input class="form-control" name="postcode" placeholder="Postcode" type="text">
                </div>
                <div class="form-group">
                  <label>Plaats</label>
                  <input class="form-control" name="plaats" placeholder="Plaats" type="text">
                </div>
                <div class="form-group">
                  <label>Telefoon</label>
                  <input class="form-control" name="telefoon" placeholder="Telefoon" type="text">
                </div>
                <div class="form-group">
                  <label>Mobiel</label>
                  <input class="form-control" name="mobiel" placeholder="Mobiel" type="text">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input class="form-control" name="email" placeholder="E-mail" type="text">
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

<!-- Edit company Modal -->
<div id="editCompany" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bedrijf bewerken</h4>
      </div>
      <div class="modal-body">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <form id="formEditCompany" method="post">
                <input class="hidden-id" name="id" hidden="">
                <!-- text input -->
                <div class="form-group">
                  <label>Naam</label>
                  <input class="form-control naam" name="naam" placeholder="Naam" type="text">
                </div>
                <div class="form-group">
                  <label>KvK</label>
                  <input class="form-control kvk" name="kvk" placeholder="KvK" type="text">
                </div>
                <div class="form-group">
                  <label>Eigenaar</label>
                  <input class="form-control eigenaar" name="eigenaar" placeholder="Eigenaar" type="text">
                </div>
                <div class="form-group">
                  <label>Bezorg adres</label>
                  <input class="form-control adres" name="adres" placeholder="Bezorg adres" type="text">
                </div>
                <div class="form-group">
                  <label>Postcode</label>
                  <input class="form-control postcode" name="postcode" placeholder="Postcode" type="text">
                </div>
                <div class="form-group">
                  <label>Plaats</label>
                  <input class="form-control plaats" name="plaats" placeholder="Plaats" type="text">
                </div>
                <div class="form-group">
                  <label>Telefoon</label>
                  <input class="form-control telefoon" name="telefoon" placeholder="Telefoon" type="text">
                </div>
                <div class="form-group">
                  <label>Mobiel</label>
                  <input class="form-control mobiel" name="mobiel" placeholder="Mobiel" type="text">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input class="form-control email" name="email" placeholder="E-mail" type="text">
                </div>
                <button class="btn btn-success editCompany" type="submit">Wijzigen</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger deleteCompany"><span class="fa fa-trash"></span> Verwijderen</button>
        <button class="btn btn-warning addUser" data-toggle="modal" data-target="#createUser"><span class="fa fa-user"></span> Gebruiker toevoegen</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Create company Modal -->
<div id="createUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Persoon toevoegen aan bedrijf</h4>
      </div>
      <div class="modal-body">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <form id="formCreateUser" method="post">
                <input class="hidden-id" name="id" hidden="">
                <!-- text input -->
                <div class="form-group">
                  <label>Voornaam</label>
                  <input class="form-control" name="voornaam" placeholder="Voornaam" type="text">
                </div>
                <div class="form-group">
                  <label>Achternaam</label>
                  <input class="form-control" name="achternaam" placeholder="Achternaam" type="text">
                </div>
                <div class="form-group">
                  <label>E-mail</label>
                  <input class="form-control" name="email" placeholder="E-mail" type="text">
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

<!-- Create company Modal -->
<div id="usersList" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Personen in dit bedrijf</h4>
      </div>
      <div class="modal-body">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listOfUsers" class="display" width="100%" cellspacing="0"></table>
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
