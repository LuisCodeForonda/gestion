<label for="">Descripcion</label>
<textarea name="descripcion" id="descripcion">{{ $accion->descripcion }}</textarea>

<label for="equipo">Equipo</label>
<select name="id_equipo">
    @foreach ($equipos as $equipo)
        <option value="{{ $equipo->id }}" @selected($accion->id_equipo==$equipo->id)>
            {{ $equipo->descripcion }}
        </option>
    @endforeach
</select>


<label for="user">Usuario</label>
<select name="id_user">
    <option value="">
        Selecciona
     </option>
    @foreach ($users as $user)
        <option value="{{ $user->id }}" @selected($accion->id_user==$user->id)>
            {{ $user->name }}
        </option>
    @endforeach
</select>

<input type="submit" value="Guardar">
