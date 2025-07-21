<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Menores - Nuevo Registro</title>
        <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>
<body>
        @include('navbar') 
        <div style="height: 100px;"></div> {{-- Distancia entre navbar y contenido --}}

    <main class="container">
        <div class="form-container">
            <div class="form-header">
                <h2>Nuevo Registro de Menor</h2>
                    <div class="form-actions">
                    <button onclick="window.location.href='{{ route('inicio') }}'" class="btn btn-secondary">Cancelar</button>
                    <button onclick="window.location.href='{{ route('inicio') }}'" class="btn btn-primary">Guardar Registro</button>
                </div>
            </div>
            
            <div class="alert-info">
                Los campos marcados con <span class="required">*</span> son obligatorios.
            </div>
            
            <!-- Sección 1: Datos Personales del Menor -->
            <div class="form-section">
                <div class="section-header">
                    <h3 class="section-title">Datos Personales del Menor</h3>
                    <span class="status-badge badge-info">Obligatorio</span>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nombre" class="required">Nombre(s)</label>
                        <input type="text" id="nombre" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="apellidoPaterno" class="required">Apellido Paterno</label>
                        <input type="text" id="apellidoPaterno" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="apellidoMaterno">Apellido Materno</label>
                        <input type="text" id="apellidoMaterno" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="curp" class="required">CURP</label>
                        <input type="text" id="curp" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="fechaNacimiento" class="required">Fecha de Nacimiento</label>
                        <input type="date" id="fechaNacimiento" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="edad" class="required">Edad</label>
                        <input type="number" id="edad" class="form-control" min="0" max="18" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="sexo" class="required">Sexo</label>
                        <select id="sexo" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" id="nacionalidad" class="form-control" value="Mexicana">
                    </div>
                </div>
            </div>
            
            <!-- Sección 2: Datos de Ingreso -->
            <div class="form-section">
                <div class="section-header">
                    <h3 class="section-title">Datos de Ingreso</h3>
                    <span class="status-badge badge-info">Obligatorio</span>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="fechaIngreso" class="required">Fecha de Ingreso</label>
                        <input type="date" id="fechaIngreso" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="albergue" class="required">Albergue</label>
                        <select id="albergue" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            <option value="1">Casa Hogar Esperanza</option>
                            <option value="2">Hogar Infantil San José</option>
                            <option value="3">Albergue Niños Felices</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="autoridad" class="required">Autoridad que Ingresa</label>
                        <select id="autoridad" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            <option value="1">DIF Municipal</option>
                            <option value="2">DIF Estatal</option>
                            <option value="3">Fiscalía</option>
                            <option value="4">Policía</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="motivoIngreso">Motivo de Ingreso</label>
                        <textarea id="motivoIngreso" class="form-control form-textarea"></textarea>
                    </div>
                </div>
            </div>
            
            <!-- Sección 3: Progenitores o Tutores -->
            <div class="form-section">
                <div class="section-header">
                    <h3 class="section-title">Progenitores o Tutores</h3>
                </div>
                
                <div class="dynamic-list" id="progenitores-list">
                    <!-- Item de ejemplo -->
                    <div class="list-item">
                        <div class="form-group" style="flex: 1;">
                            <label for="progenitorNombre1">Nombre(s)</label>
                            <input type="text" id="progenitorNombre1" class="form-control">
                        </div>
                        
                        <div class="form-group" style="flex: 1;">
                            <label for="progenitorApellidoPaterno1">Apellido Paterno</label>
                            <input type="text" id="progenitorApellidoPaterno1" class="form-control">
                        </div>
                        
                        <div class="form-group" style="flex: 1;">
                            <label for="progenitorApellidoMaterno1">Apellido Materno</label>
                            <input type="text" id="progenitorApellidoMaterno1" class="form-control">
                        </div>
                        
                        <div class="form-group" style="flex: 1;">
                            <label for="progenitorRelacion1">Relación</label>
                            <select id="progenitorRelacion1" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="Madre">Madre</option>
                                <option value="Padre">Padre</option>
                                <option value="Tutor">Tutor</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="form-group" style="flex: 1;">
                            <label for="progenitorEstado1">Estado Actual</label>
                            <select id="progenitorEstado1" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="Ubicado">Ubicado</option>
                                <option value="No ubicado">No ubicado</option>
                                <option value="Fallecido">Fallecido</option>
                                <option value="Desconocido">Desconocido</option>
                            </select>
                        </div>

                        <div class="form-group" style="flex: 1;">
                            <label for="progenitorTelefono1">Teléfono</label>
                            <input type="tel" id="progenitorTelefono1" class="form-control">
                        </div>
                                        
                        <span class="remove-item">×</span>
                    </div>
                </div>
                
                <div class="add-item" id="add-progenitor">
                    <span>+</span> Agregar otro progenitor/tutor
                </div>
            </div>
            
            <!-- Sección 4: Expediente Judicial -->
            <div class="form-section">
                <div class="section-header">
                    <h3 class="section-title">Expediente Judicial</h3>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="autoridadJudicial">Autoridad Judicial</label>
                        <select id="autoridadJudicial" class="form-control">
                            <option value="">Seleccionar...</option>
                            <option value="1">Juzgado de Menores</option>
                            <option value="2">Fiscalía Especializada</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="estadoProcesal">Estado Procesal</label>
                        <select id="estadoProcesal" class="form-control">
                            <option value="">Seleccionar...</option>
                            <option value="En investigación">En investigación</option>
                            <option value="Proceso judicial">Proceso judicial</option>
                            <option value="Sentenciado">Sentenciado</option>
                            <option value="Archivado">Archivado</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="fechaInicioProceso">Fecha de Inicio</label>
                        <input type="date" id="fechaInicioProceso" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="carpetaInvestigacion">Carpeta de Investigación</label>
                        <input type="text" id="carpetaInvestigacion" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="observacionesJudiciales">Observaciones</label>
                    <textarea id="observacionesJudiciales" class="form-control form-textarea"></textarea>
                </div>
            </div>
            
            <!-- Sección 5: Seguimiento -->
            <div class="form-section">
                <div class="section-header">
                    <h3 class="section-title">Seguimiento</h3>
                </div>
                
                <div class="sub-section">
                    <div class="sub-section-title">Áreas de Seguimiento</div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Seguimiento Jurídico</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="juridicoSi" name="juridico" value="Si">
                                    <label for="juridicoSi">Sí</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="juridicoNo" name="juridico" value="No" checked>
                                    <label for="juridicoNo">No</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Seguimiento Psicológico</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="psicologicoSi" name="psicologico" value="Si">
                                    <label for="psicologicoSi">Sí</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="psicologicoNo" name="psicologico" value="No" checked>
                                    <label for="psicologicoNo">No</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Seguimiento Trabajo Social</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="socialSi" name="social" value="Si">
                                    <label for="socialSi">Sí</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="socialNo" name="social" value="No" checked>
                                    <label for="socialNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="sub-section">
                    <div class="sub-section-title">Medidas de Protección</div>
                    
                    <div class="dynamic-list" id="medidas-list">
                        <!-- Item de ejemplo -->
                        <div class="list-item">
                            <div class="form-group" style="flex: 1;">
                                <label for="medidaTipo1">Tipo de Medida</label>
                                <select id="medidaTipo1" class="form-control">
                                    <option value="">Seleccionar...</option>
                                    <option value="Custodia">Custodia</option>
                                    <option value="Tutela">Tutela</option>
                                    <option value="Pérdida patria potestad">Pérdida patria potestad</option>
                                </select>
                            </div>
                            
                            <div class="form-group" style="flex: 1;">
                                <label for="medidaFecha1">Fecha de Inicio</label>
                                <input type="date" id="medidaFecha1" class="form-control">
                            </div>
                            
                            <div class="form-group" style="flex: 1;">
                                <label for="medidaEstado1">Estado</label>
                                <select id="medidaEstado1" class="form-control">
                                    <option value="">Seleccionar...</option>
                                    <option value="Vigente">Vigente</option>
                                    <option value="Concluida">Concluida</option>
                                </select>
                            </div>
                            
                            <span class="remove-item">×</span>
                        </div>
                    </div>
                    
                    <div class="add-item" id="add-medida">
                        <span>+</span> Agregar otra medida
                    </div>
                </div>
            </div>
            
            <!-- Sección 6: Ubicación Actual -->
            <div class="form-section">
                <div class="section-header">
                    <h3 class="section-title">Ubicación Actual</h3>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="ubicacionTipo">Tipo de Ubicación</label>
                        <select id="ubicacionTipo" class="form-control">
                            <option value="">Seleccionar...</option>
                            <option value="Albergue">Albergue</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="ubicacionNombre">Nombre (Albergue/Familiar)</label>
                        <input type="text" id="ubicacionNombre" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="ubicacionParentesco">Parentesco (si aplica)</label>
                        <input type="text" id="ubicacionParentesco" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="ubicacionEstatus">Estatus</label>
                        <select id="ubicacionEstatus" class="form-control">
                            <option value="">Seleccionar...</option>
                            <option value="Temporal">Temporal</option>
                            <option value="Permanente">Permanente</option>
                            <option value="En transición">En transición</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="ubicacionDireccion">Dirección</label>
                    <textarea id="ubicacionDireccion" class="form-control form-textarea"></textarea>
                </div>
            </div>
            
            <!-- Sección 7: Fugas (si aplica) -->
            <div class="form-section">
                <div class="section-header">
                    <h3 class="section-title">Registro de Fugas (si aplica)</h3>
                </div>
                
                <div class="dynamic-list" id="fugas-list">
                    <!-- Item de ejemplo -->
                    <div class="list-item">
                        <div class="form-group" style="flex: 1;">
                            <label for="fugaFecha1">Fecha</label>
                            <input type="date" id="fugaFecha1" class="form-control">
                        </div>
                        
                        <div class="form-group" style="flex: 2;">
                            <label for="fugaDescripcion1">Descripción</label>
                            <input type="text" id="fugaDescripcion1" class="form-control">
                        </div>
                        
                        <div class="form-group" style="flex: 1;">
                            <label for="fugaEstatus1">Estatus</label>
                            <select id="fugaEstatus1" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="Localizado">Localizado</option>
                                <option value="No localizado">No localizado</option>
                            </select>
                        </div>
                        
                        <span class="remove-item">×</span>
                    </div>
                </div>
                
                <div class="add-item" id="add-fuga">
                    <span>+</span> Agregar otro registro de fuga
                </div>
            </div>
            
            <!-- Botones finales -->
            <div class="form-actions" style="margin-top: 30px; justify-content: flex-end;">
                <button onclick="window.location.href='{{ route('inicio') }}'" class="btn btn-secondary">Cancelar</button>
                <button class="btn btn-primary">Guardar Registro</button>
            </div>
        </div>
        <br><br>
    </main>

    <script>
        // Funcionalidad básica para agregar elementos dinámicos
       document.getElementById('add-progenitor').addEventListener('click', function() {
    const list = document.getElementById('progenitores-list');
    const count = list.children.length + 1;
    
    const newItem = document.createElement('div');
    newItem.className = 'list-item';
    newItem.innerHTML = `
        <div class="form-group" style="flex: 1;">
            <label for="progenitorNombre${count}">Nombre(s)</label>
            <input type="text" id="progenitorNombre${count}" class="form-control">
        </div>
        
        <div class="form-group" style="flex: 1;">
            <label for="progenitorApellidoPaterno${count}">Apellido Paterno</label>
            <input type="text" id="progenitorApellidoPaterno${count}" class="form-control">
        </div>
        
        <div class="form-group" style="flex: 1;">
            <label for="progenitorApellidoMaterno${count}">Apellido Materno</label>
            <input type="text" id="progenitorApellidoMaterno${count}" class="form-control">
        </div>
        
        <div class="form-group" style="flex: 1;">
            <label for="progenitorRelacion${count}">Relación</label>
            <select id="progenitorRelacion${count}" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="Madre">Madre</option>
                <option value="Padre">Padre</option>
                <option value="Tutor">Tutor</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        
        <div class="form-group" style="flex: 1;">
            <label for="progenitorEstado${count}">Estado Actual</label>
            <select id="progenitorEstado${count}" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="Ubicado">Ubicado</option>
                <option value="No ubicado">No ubicado</option>
                <option value="Fallecido">Fallecido</option>
                <option value="Desconocido">Desconocido</option>
            </select>
        </div>
        
        <div class="form-group" style="flex: 1;">
            <label for="progenitorTelefono${count}">Teléfono</label>
            <input type="tel" id="progenitorTelefono${count}" class="form-control">
        </div>
        
        <span class="remove-item">×</span>
    `;
    
    list.appendChild(newItem);
    setupRemoveButton(newItem.querySelector('.remove-item'));
});
        
        document.getElementById('add-medida').addEventListener('click', function() {
            const list = document.getElementById('medidas-list');
            const count = list.children.length + 1;
            
            const newItem = document.createElement('div');
            newItem.className = 'list-item';
            newItem.innerHTML = `
                <div class="form-group" style="flex: 1;">
                    <label for="medidaTipo${count}">Tipo de Medida</label>
                    <select id="medidaTipo${count}" class="form-control">
                        <option value="">Seleccionar...</option>
                        <option value="Custodia">Custodia</option>
                        <option value="Tutela">Tutela</option>
                        <option value="Pérdida patria potestad">Pérdida patria potestad</option>
                    </select>
                </div>
                
                <div class="form-group" style="flex: 1;">
                    <label for="medidaFecha${count}">Fecha de Inicio</label>
                    <input type="date" id="medidaFecha${count}" class="form-control">
                </div>
                
                <div class="form-group" style="flex: 1;">
                    <label for="medidaEstado${count}">Estado</label>
                    <select id="medidaEstado${count}" class="form-control">
                        <option value="">Seleccionar...</option>
                        <option value="Vigente">Vigente</option>
                        <option value="Concluida">Concluida</option>
                    </select>
                </div>
                
                <span class="remove-item">×</span>
            `;
            
            list.appendChild(newItem);
            setupRemoveButton(newItem.querySelector('.remove-item'));
        });
        
        document.getElementById('add-fuga').addEventListener('click', function() {
            const list = document.getElementById('fugas-list');
            const count = list.children.length + 1;
            
            const newItem = document.createElement('div');
            newItem.className = 'list-item';
            newItem.innerHTML = `
                <div class="form-group" style="flex: 1;">
                    <label for="fugaFecha${count}">Fecha</label>
                    <input type="date" id="fugaFecha${count}" class="form-control">
                </div>
                
                <div class="form-group" style="flex: 2;">
                    <label for="fugaDescripcion${count}">Descripción</label>
                    <input type="text" id="fugaDescripcion${count}" class="form-control">
                </div>
                
                <div class="form-group" style="flex: 1;">
                    <label for="fugaEstatus${count}">Estatus</label>
                    <select id="fugaEstatus${count}" class="form-control">
                        <option value="">Seleccionar...</option>
                        <option value="Localizado">Localizado</option>
                        <option value="No localizado">No localizado</option>
                    </select>
                </div>
                
                <span class="remove-item">×</span>
            `;
            
            list.appendChild(newItem);
            setupRemoveButton(newItem.querySelector('.remove-item'));
        });
        
        function setupRemoveButton(button) {
            button.addEventListener('click', function() {
                this.parentElement.remove();
            });
        }
        
        // Configurar botones de eliminar existentes
        document.querySelectorAll('.remove-item').forEach(button => {
            setupRemoveButton(button);
        });
    </script>
</body>
</html>