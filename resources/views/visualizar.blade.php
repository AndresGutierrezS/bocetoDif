<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Menor | Sistema de Gestión de Menores</title>
    <link rel="stylesheet" href="{{ asset('css/visualizar.css') }}">

    
</head>
<body>
     @include('navbar') 
            <div style="height: 80px;"></div> {{-- distancia entre navbar y contenido --}}

    <main class="container">
        <div class="profile-header">
            <img src="{{ asset('images/menorFemina.png') }}" alt="Foto" class="profile-photo">
            <div class="profile-info">
                <h2>{{$menor->nombre}} {{$menor->apellido_paterno}} {{$menor->apellido_materno}}</h2>
                <div class="profile-meta">
                    <span class="meta-item">CURP: {{$menor->curp}}</span>
                    <span class="meta-item">Edad: {{$menor->edad}} años</span>
                    <span class="meta-item">Sexo: {{$menor->sexo}}</span>
                </div>
                <div>
                    <span class="status-badge badge-active">Activo</span>
                    <span class="meta-item">Registro: {{$menor->fecha_puesta}}</span>
                </div>
            </div>
        </div>

        <!-- Sección 1: Datos Personales -->
        <div class="detail-section">
            <div class="section-header">
                <h3 class="section-title">Datos Personales</h3>
            </div>
            <div class="section-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">Nombre Completo</span>
                        <div class="detail-value">{{$menor->nombre}} {{$menor->apellido_paterno}} {{$menor->apellido_materno}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">CURP</span>
                        <div class="detail-value">{{$menor->curp}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Fecha de Nacimiento</span>
                        <div class="detail-value">{{$menor->fecha_nacimiento}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Sexo</span>
                        <div class="detail-value">{{$menor->sexo}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nacionalidad</span>
                        <div class="detail-value">todo</div>
                    </div>
                    {{-- <div class="detail-item">
                        <span class="detail-label">Estado de Origen</span>
                        <div class="detail-value">Ciudad de México</div>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- Sección 2: Datos de Ingreso -->
        <div class="detail-section">
            <div class="section-header">
                <h3 class="section-title">Datos de Ingreso</h3>
            </div>
            <div class="section-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">Fecha de Ingreso</span>
                        <div class="detail-value">{{$menor->fecha_puesta}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Albergue Actual</span>
                        <div class="detail-value">{{$menor->ubicacion_actual}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Autoridad que Ingresó</span>
                        <div class="detail-value">todo</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Motivo de Ingreso</span>
                        <div class="detail-value">todo</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección 3: Progenitores o Tutores -->
        <div class="detail-section">
            <div class="section-header">
                <h3 class="section-title">Progenitores o Tutores</h3>
            </div>
            <div class="section-body">
                <div class="detail-grid">
                    
                    @foreach ($menor->progenitores as $index => $progenitor)
                        <div class="detail-item">
                            <span class="detail-label">todo: Madre</span>
                            <div class="detail-value">
                                <strong>{{$progenitor->nombre}} {{$progenitor->apellido_paterno}} {{$progenitor->apellido_materno}}</strong><br>
                                Estado: todo: No ubicado<br>
                                Teléfono: todo: No disponible
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Sección 4: Expediente Judicial -->
        <div class="detail-section">
            <div class="section-header">
                <h3 class="section-title">Expediente Judicial</h3>
            </div>
            <div class="section-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">Autoridad Judicial</span>
                        <div class="detail-value">{{$menor->expedienteJudicial->autoridad_judicial}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Estado Procesal</span>
                        <div class="detail-value">{{$menor->expedienteJudicial->estado_procesal}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Fecha de Inicio</span>
                        <div class="detail-value">{{$menor->expedienteJudicial->fecha_inicio_proceso}}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Carpeta de Investigación</span>
                        <div class="detail-value">{{$menor->expedienteJudicial->carpeta_investigacion}}</div>
                    </div>
                </div>
                <div class="detail-item" style="margin-top: 15px;">
                    <span class="detail-label">Observaciones</span>
                    <div class="detail-value">{{$menor->expedienteJudicial->observaciones_judiciales}}</div>
                </div>
            </div>
        </div>

        <!-- Sección 5: Seguimiento -->
        <div class="detail-section">
            <div class="section-header">
                <h3 class="section-title">Seguimiento</h3>
            </div>
            <div class="section-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">Seguimiento Jurídico</span>
                        <div class="detail-value">
                            <span class="status-badge badge-active">Activo</span><br>
                            El menor tiene seguimiento jurídico<br>
                        </div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Seguimiento Psicológico</span>
                        <div class="detail-value">
                            <span class="status-badge badge-active">Activo</span><br>
                            El menor tiene seguimiento psicológico<br>
                        </div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Seguimiento Trabajo Social</span>
                        <div class="detail-value">
                            <span class="status-badge badge-active">Activo</span><br>
                            El menor tiene seguimiento del trabajo social<br>
                        </div>
                    </div>
                </div>
                
                <!-- Medidas de Protección -->
                <div style="margin-top: 30px;">
                    <h4 style="color: var(--azul-oscuro); margin-bottom: 15px;">Medidas de Protección</h4>
                    <div class="detail-grid">
                        
                        @foreach ($menor->medidasProteccion as $index => $medida)
                            
                            <div class="detail-item">
                                <span class="detail-label">{{$medida->tipo_medida}}</span>
                                <div class="detail-value">
                                    <strong>Estado:</strong> {{$medida->detalles_medida}}<br>
                                    <strong>Inicio:</strong> {{$medida->fecha}}<br>
                                    {{-- <strong>Observaciones:</strong> Hasta que se resuelva situación familiar --}}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <!-- Sección 6: Ubicación Actual -->
        <div class="detail-section">
            <div class="section-header">
                <h3 class="section-title">Ubicación Actual</h3>
            </div>
            <div class="section-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">Tipo de Ubicación</span>
                        <div class="detail-value">Albergue</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nombre</span>
                        <div class="detail-value">Casa Hogar Esperanza</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Estatus</span>
                        <div class="detail-value">Temporal</div>
                    </div>
                </div>
                <div class="detail-item" style="margin-top: 15px;">
                    <span class="detail-label">Dirección</span>
                    <div class="detail-value">Av. Siempre Viva 742, Col. Flores, CDMX</div>
                </div>
            </div>
        </div>

        <!-- Sección 7: Historial de Fugas -->
        <div class="detail-section">
            <div class="section-header">
                <h3 class="section-title">Historial de Fugas</h3>
            </div>
            <div class="section-body">
                
                @forelse ($menor->fugas as $index => $fuga)    
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">{{$fuga->fecha}}</div>
                            <div class="timeline-content">
                                <strong>Estatus:</strong> 
                                <span class="status-badge badge-active">Localizado: todo</span>
                                <br>
                                <strong>Descripción:</strong> {{$fuga->detalles}}<br>
                                <strong>Fecha de retorno:</strong> {{$fuga->fecha}}<br>
                            </div>
                        </div>
                    </div>
                @empty
                    <p style="">No fugas registradas</p>
                @endforelse
                
            </div>
        </div>

        <!-- Sección de documentos -->
        {{-- <div class="detail-section">
            <div class="section-header">
                <h3 class="section-title">Documentos</h3>
            </div>
            <div class="section-body">
                <div class="document-list">
                    <div class="document-item">
                        <div class="document-icon">📄</div>
                        <div class="document-name">
                            <strong>Acta de nacimiento</strong><br>
                            <small>Tipo: Identificación | Fecha: 15/01/2015</small>
                        </div>
                        <div class="document-actions">
                            <button class="btn btn-secondary" style="padding: 5px 10px;">Ver</button>
                            <button class="btn btn-primary" style="padding: 5px 10px;">Descargar</button>
                        </div>
                    </div>
                    <div class="document-item">
                        <div class="document-icon">📄</div>
                        <div class="document-name">
                            <strong>Dictamen médico inicial</strong><br>
                            <small>Tipo: Médico | Fecha: 16/03/2023</small>
                        </div>
                        <div class="document-actions">
                            <button class="btn btn-secondary" style="padding: 5px 10px;">Ver</button>
                            <button class="btn btn-primary" style="padding: 5px 10px;">Descargar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Botones de acción -->
        <div class="actions-toolbar">
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{route('inicio')}}'">Regresar</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('formulario.edit', $menor)}}'">Editar Registro</button>
            <button class="btn btn-danger">Dar de Baja</button>
        </div>
    </main>
</body>
</html>