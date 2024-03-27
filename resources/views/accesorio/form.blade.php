<label for="">Descripcion</label>
<textarea name="descripcion" id="descripcion">{{ $accesorio->descripcion }}</textarea>

<label for="marca">Equipo</label>
<select name="id_equipo">
    
    @foreach ($equipos as $equipo)
        <option value="{{ $equipo->id }}" @selected($equipo->id == $accesorio->id_equipo)>
            {{ $equipo->descripcion }}
        </option>
    @endforeach
</select>


<label for="marca">Marca</label>
<select name="id_marca">
    <option value="">
        Selecciona
     </option>
    @foreach ($marcas as $marca)
        <option value="{{ $marca->id }}" @selected($marca->id == $accesorio->id_marca)>
            {{ $marca->nombre }}
        </option>
    @endforeach
</select>

<label for="">Modelo</label>
<input type="text" name="modelo" id="" value="{{ $accesorio->modelo }}">

<label for="">Serie</label>
<input type="text" name="serie" id="" value="{{ $accesorio->serie }}">

<label for="">Cantidad</label>
<input type="number" name="cantidad" id="" value="{{$accesorio->cantidad ? $accesorio->cantidad : 1}}">

<input type="submit" value="Guardar">
