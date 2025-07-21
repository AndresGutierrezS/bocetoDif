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
                <h2>María Fernanda López García</h2>
                <div class="profile-meta">
                    <span class="meta-item">CURP: LOGF0201015HDFRRA8</span>
                    <span class="meta-item">Edad: 8 años</span>
                    <span class="meta-item">Sexo: Femenino</span>
                </div>
                <div>
                    <span class="status-badge badge-active">Activo</span>
                    <span class="meta-item">Registro: 15/03/2023</span>
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
                        <div class="detail-value">María Fernanda López García</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">CURP</span>
                        <div class="detail-value">LOGF0201015HDFRRA8</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Fecha de Nacimiento</span>
                        <div class="detail-value">01/01/2015</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Sexo</span>
                        <div class="detail-value">Femenino</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Nacionalidad</span>
                        <div class="detail-value">Mexicana</div>
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
                        <div class="detail-value">15/03/2023</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Albergue Actual</span>
                        <div class="detail-value">Casa Hogar Esperanza</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Autoridad que Ingresó</span>
                        <div class="detail-value">DIF Municipal</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Motivo de Ingreso</span>
                        <div class="detail-value">Abandono familiar</div>
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
                    <div class="detail-item">
                        <span class="detail-label">Madre</span>
                        <div class="detail-value">
                            <strong>Ana García Martínez</strong><br>
                            Estado: No ubicado<br>
                            Teléfono: No disponible
                        </div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Padre</span>
                        <div class="detail-value">
                            <strong>Juan López Pérez</strong><br>
                            Estado: Ubicado<br>
                            Teléfono: 55 1234 5678<br>
                        </div>
                    </div>
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
                        <div class="detail-value">Juzgado de Menores Núm. 3</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Estado Procesal</span>
                        <div class="detail-value">En investigación</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Fecha de Inicio</span>
                        <div class="detail-value">20/03/2023</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Carpeta de Investigación</span>
                        <div class="detail-value">FDS/0456/2023</div>
                    </div>
                </div>
                <div class="detail-item" style="margin-top: 15px;">
                    <span class="detail-label">Observaciones</span>
                    <div class="detail-value">Se está buscando a familiares extensos para posible reintegración familiar.</div>
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
                        <div class="detail-item">
                            <span class="detail-label">Custodia Temporal</span>
                            <div class="detail-value">
                                <strong>Estado:</strong> Vigente<br>
                                <strong>Inicio:</strong> 15/03/2023<br>
                                {{-- <strong>Observaciones:</strong> Hasta que se resuelva situación familiar --}}
                            </div>
                        </div>
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
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">05/04/2023</div>
                        <div class="timeline-content">
                            <strong>Estatus:</strong> 
                            <span class="status-badge badge-active">Localizado</span>
                            <br>
                            <strong>Descripción:</strong> Salida no autorizada durante visita al parque<br>
                            <strong>Fecha de retorno:</strong> 05/04/2023<br>
                        </div>
                    </div>
                </div>
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
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('formulario')}}'">Editar Registro</button>
            <button class="btn btn-danger">Dar de Baja</button>
        </div>
    </main>
</body>
</html>