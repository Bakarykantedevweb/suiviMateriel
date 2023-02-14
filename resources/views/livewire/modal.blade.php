  <div wire:ignore.self class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Modification Materiel Recuperé</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form wire:submit.prevent="updateMateriel">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Departement</label>
                                  <select class="form-control select2bs4" wire:model="departement" style="width: 100%;">
                                      <option></option>
                                      @forelse ($departements as $item)
                                          <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                      @empty
                                          <option>Pas de Departement</option>
                                      @endforelse
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Date Entrer</label>
                                  <input type="date" class="form-control" wire:model="date_entre">
                              </div>
                              <div class="form-group">
                                  <label>Marque</label>
                                  <input type="text" class="form-control" wire:model="marque">
                              </div>
                              <div class="form-group">
                                  <label>Model</label>
                                  <input type="text" class="form-control" wire:model="model">
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Type de Materiel</label>
                                  <select class="form-control" id="change" wire:model="type" style="width: 100%;">
                                      <option></option>
                                      <option value="Ordinateur">Ordinateur</option>
                                      <option value="Imprimante">Imprimante</option>
                                      <option value="Scanner">Scanner</option>
                                      <option value="Disk">Disk</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Etat</label>
                                  <select class="form-control" id="change" wire:model="etat" style="width: 100%;">
                                      <option></option>
                                      <option value="Bon">Bon</option>
                                      <option value="En Panne">En Panne</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label>Serie</label>
                                  <input type="text" class="form-control" wire:model="serie">
                              </div>
                              <div class="form-group">
                                  <label>Description</label>
                                  <textarea class="form-control" wire:model="description" cols="10" rows="10"></textarea>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Mettre à jour</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>




  {{-- <div wire:ignore.self class="modal fade" id="modal-lg1">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Ajout Materiel Recuperé</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form wire:submit.prevent="addMateriel">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Departement</label>
                                  <select class="form-control select2bs4" name="departement" style="width: 100%;">
                                      <option></option>
                                      @forelse ($departements as $item)
                                          <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                      @empty
                                          <option>Pas de Departement</option>
                                      @endforelse
                                  </select>
                                  @error('departement')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>Date Entrer</label>
                                  <input type="date" class="form-control" name="date_entre">
                                  @error('date_entre')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Type de Materiel</label>
                                  <select class="form-control" id="change" name="type" style="width: 100%;">
                                      <option></option>
                                      <option value="Ordinateur">Ordinateur</option>
                                      <option value="Imprimante">Imprimante</option>
                                      <option value="Scanner">Scanner</option>
                                      <option value="Disk">Disk</option>
                                  </select>
                                  @error('type')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label>Etat</label>
                                  <select class="form-control" id="change" name="etat" style="width: 100%;">
                                      <option></option>
                                      <option value="Bon">Bon</option>
                                      <option value="En Panne">En Panne</option>
                                  </select>
                                  @error('etat')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-md-6" id="row">

                          </div>
                          <div class="col-md-12">
                              <div class="form-group" id="input">

                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Mettre à jour</button>
                  </div>
              </form>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div> --}}
