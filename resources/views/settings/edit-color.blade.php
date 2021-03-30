<form class="ui form" method="POST" action="{{ route('settings.updateColor', $color->id) }}">
  {{ csrf_field() }}
    <div class="field">
      <label>Renk Kodu</label>
      <input type="text" name="name" placeholder="Name" required value={{ $color->name }} />
    </div>
    <div class="field">
      <label>Açıklama</label>
      <input type="text" name="description" placeholder="Açıklama" required value={{ $color->description }} />
    </div>
    <button class="ui button" type="submit">Kaydet</button>
  </form>
