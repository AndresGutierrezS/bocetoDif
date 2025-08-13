<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Menores - Acceso</title>
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
</head>
<body>
        @include('navbar') 
            <div style="height: 80px;"></div> {{-- distancia entre navbar y contenido --}}
   
    <main class="container">
        <div class="search-bar">
            <form class="search-form">
                <input type="text" placeholder="Buscar por nombre, CURP o albergue...">
                <button type="submit">Buscar</button>
            </form>
        </div>
        
        <div class="records-container">
            <div class="records-header">
                <h2>Registros de Menores</h2>
                <div class="records-actions">
                    <button type="button" onclick="window.location.href='{{route('formulario.index')}}'">Nuevo Registro</button>
                    {{--     --}}
                </div>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Persona Menor</th>
                        <th>CURP</th>
                        <th>Fecha Nac.</th>
                        <th>Fecha Ingreso</th>
                        <th>Albergue</th>
                        <th>Autoridad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                
                
                @forelse ($menores as $menor)    
                
                <tbody>
                    <tr>
                        <td>
                            <strong>{{ $menor->nombre }} {{ $menor->apellido_paterno }} {{ $menor->apellido_materno }} </strong><br>
                            <small>{{ $menor->sexo }} · {{ $menor->edad }} años</small>
                        </td>
                        <td>{{ $menor->curp }}</td>
                        <td>{{ $menor->fecha_nacimiento }}</td>
                        <td>{{ $menor->fecha_puesta }}</td>
                        <td>{{ $menor->ubicacion_actual }}</td>
                        <td>{{ $menor->equipo_id }}</td>
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <div class="actions">
                                <button type="button" onclick="window.location.href='{{route('formulario.edit', $menor)}}'" title="Editar">✏️</button>
                                <button type="button" onclick="window.location.href=#" title="Ver detalles">👁️</button>
                                {{-- <button title="Ver detalles">👁️</button> --}}
                                <button title="Documentos">📄</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No hay registros disponibles.</td>
                    </tr>
                @endforelse
                    {{-- <tr>
                        <td>
                            <strong>Juan Carlos Martínez Sánchez</strong><br>
                            <small>Masculino · 10 años</small>
                        </td>
                        <td>MASJ1201012HDFRNN5</td>
                        <td>12/01/2012</td>
                        <td>22/05/2022</td>
                        <td>Hogar Infantil San José</td>
                        <td>Fiscalía</td>
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <div class="actions">
                                <button title="Editar">✏️</button>
                                <button title="Ver detalles">👁️</button>
                                <button title="Documentos">📄</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Ana Patricia Ramírez Cruz</strong><br>
                            <small>Femenino · 6 años</small>
                        </td>
                        <td>RACA0601018HDFRNA2</td>
                        <td>01/01/2018</td>
                        <td>10/01/2024</td>
                        <td>Albergue Niños Felices</td>
                        <td>DIF Estatal</td>
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <div class="actions">
                                <button title="Editar">✏️</button>
                                <button title="Ver detalles">👁️</button>
                                <button title="Documentos">📄</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Luis Ángel González Pérez</strong><br>
                            <small>Masculino · 12 años</small>
                        </td>
                        <td>GOPL1210012HDFRSA4</td>
                        <td>10/01/2012</td>
                        <td>05/11/2021</td>
                        <td>Hogar del Niño</td>
                        <td>DIF Municipal</td>
                        <td><span class="badge badge-inactive">Egresado</span></td>
                        <td>
                            <div class="actions">
                                <button title="Editar">✏️</button>
                                <button title="Ver detalles">👁️</button>
                                <button title="Documentos">📄</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Sofía Hernández Mendoza</strong><br>
                            <small>Femenino · 9 años</small>
                        </td>
                        <td>HEMS0901015HDFRND7</td>
                        <td>01/01/2015</td>
                        <td>18/07/2023</td>
                        <td>Casa Hogar Santa María</td>
                        <td>Fiscalía</td>
                        <td><span class="badge badge-active">Activo</span></td>
                        <td>
                            <div class="actions">
                                <button title="Editar">✏️</button>
                                <button title="Ver detalles">👁️</button>
                                <button title="Documentos">📄</button>
                            </div>
                        </td>
                    </tr>
                </tbody> --}}
            </table>
            
            <div class="pagination">
                <button>&laquo;</button>
                <button class="active">1</button>
                <button>2</button>
                <button>3</button>
                <button>&raquo;</button>
            </div>
        </div>
    </main>
</body>
</html>