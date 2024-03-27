<label for="">Descripcion</label>
<textarea name="descripcion" id="descripcion">{{ $equipo->descripcion }}</textarea>

<label for="marca">Marca</label>
<select name="id_marca">
    @foreach ($marcas as $marca)
        <option value="{{ $marca->id }}" @selected($equipo->id_marca == $marca->id)>
            {{ $marca->nombre }}
        </option>
    @endforeach
</select>

<label for="">Modelo</label>
<input type="text" name="modelo" id="" value="{{ $equipo->modelo }}">

<label for="">Serie</label>
<input type="text" name="serie" id="" value="{{ $equipo->serie }}">

<label for="">Serietec</label>
<input type="text" name="serietec" id="" value="{{ $equipo->serietec }}">

<label for="">Estado</label>
<input type="text" name="estado" id="" value="{{ $equipo->estado }}">

<input type="submit" value="Guardar">