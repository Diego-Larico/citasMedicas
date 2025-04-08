<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Correo Médico | Citas Médicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/mail.css">
</head>
<body>
    <div class="mail-container">
        <!-- Sidebar -->
        <div class="mail-sidebar">
            <div class="sidebar-header">
                <h3><i class="fas fa-envelope"></i> Correo</h3>
                <button class="btn btn-primary compose-btn" id="composeBtn">
                    <i class="fas fa-plus"></i> Redactar
                </button>
            </div>
            
            <ul class="nav flex-column mail-folders">
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-folder="inbox">
                        <i class="fas fa-inbox"></i>Bandeja de entrada
                        <span class="badge bg-primary float-end m-1">24</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-folder="sent">
                        <i class="fas fa-paper-plane"></i>Enviados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-folder="drafts">
                        <i class="fas fa-file-alt"></i>Borradores
                        <span class="badge bg-secondary float-end m-1">3</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-folder="trash">
                        <i class="fas fa-trash-alt"></i>Papelera
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-folder="important">
                        <i class="fas fa-star"></i>Importantes
                    </a>
                </li>
            </ul>
            
            <div class="sidebar-footer">
                <div class="storage-status">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65% usado</div>
                    </div>
                    <small>15.4 GB de 25 GB</small>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="mail-main">
            <!-- Toolbar -->
            <div class="mail-toolbar">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-light" title="Actualizar">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <button type="button" class="btn btn-light" title="Archivar">
                        <i class="fas fa-archive"></i>
                    </button>
                    <button type="button" class="btn btn-light" title="Reportar spam">
                        <i class="fas fa-exclamation-circle"></i>
                    </button>
                    <button type="button" class="btn btn-light" title="Eliminar">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    <button type="button" class="btn btn-light" title="Marcar como importante">
                        <i class="fas fa-star"></i>
                    </button>
                </div>
                
                <div class="mail-search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar en correos...">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Email List -->
            <div class="mail-list">
                <div class="list-header">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                    </div>
                    <div class="header-sender">De</div>
                    <div class="header-subject">Asunto</div>
                    <div class="header-date">Fecha</div>
                    <div class="header-actions">Acciones</div>
                </div>
                
                <div class="email-item unread important">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                    </div>
                    <div class="email-sender">
                        <i class="fas fa-star text-warning"></i>
                        Dr. Juan Pérez
                    </div>
                    <div class="email-subject">
                        <strong>Resultados de laboratorio - Urgente</strong>
                        <span class="email-preview">Los resultados de su último examen muestran valores fuera del rango normal...</span>
                    </div>
                    <div class="email-date">
                        <span class="badge bg-danger">Hoy</span> 10:30 AM
                    </div>
                    <div class="email-actions">
                        <button class="btn btn-sm btn-link"><i class="fas fa-archive"></i></button>
                        <button class="btn btn-sm btn-link"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                
                <div class="email-item unread">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                    </div>
                    <div class="email-sender">
                        Clínica San José
                    </div>
                    <div class="email-subject">
                        <strong>Confirmación de cita</strong>
                        <span class="email-preview">Su cita para el día 15 de marzo ha sido confirmada...</span>
                    </div>
                    <div class="email-date">
                        Ayer
                    </div>
                    <div class="email-actions">
                        <button class="btn btn-sm btn-link"><i class="fas fa-archive"></i></button>
                        <button class="btn btn-sm btn-link"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                
                <div class="email-item">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                    </div>
                    <div class="email-sender">
                        Dr. Ana López
                    </div>
                    <div class="email-subject">
                        Re: Consulta sobre medicación
                    </div>
                    <div class="email-date">
                        12 Mar
                    </div>
                    <div class="email-actions">
                        <button class="btn btn-sm btn-link"><i class="fas fa-archive"></i></button>
                        <button class="btn btn-sm btn-link"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
                
                <!-- More email items... -->
            </div>
            
            <!-- Pagination -->
            <nav class="mail-pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <!-- Email Detail View (hidden by default) -->
        <div class="mail-detail">
            <div class="detail-toolbar">
                <button class="btn btn-light back-to-list">
                    <i class="fas fa-arrow-left"></i> Volver
                </button>
                <div class="btn-group">
                    <button class="btn btn-light"><i class="fas fa-reply"></i></button>
                    <button class="btn btn-light"><i class="fas fa-reply-all"></i></button>
                    <button class="btn btn-light"><i class="fas fa-share"></i></button>
                    <button class="btn btn-light"><i class="fas fa-print"></i></button>
                    <button class="btn btn-light"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
            
            <div class="email-header">
                <h4 class="email-subject">Resultados de laboratorio - Urgente</h4>
                <div class="email-meta">
                    <div class="sender-info">
                        <img src="https://via.placeholder.com/40" alt="Sender" class="sender-avatar">
                        <div>
                            <strong>Dr. Juan Pérez</strong>
                            <small class="text-muted">&lt;juan.perez@clinica.com&gt;</small>
                        </div>
                    </div>
                    <div class="email-date">10:30 AM, Hoy</div>
                </div>
                <div class="email-recipients">
                    <strong>Para:</strong> paciente@example.com
                </div>
            </div>
            
            <div class="email-body">
                <p>Estimado paciente,</p>
                
                <p>Los resultados de sus últimos exámenes de laboratorio han llegado y muestran algunos valores fuera del rango normal que requieren atención:</p>
                
                <div class="medical-results">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Examen</th>
                                <th>Resultado</th>
                                <th>Rango Normal</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="abnormal">
                                <td>Glucosa en ayunas</td>
                                <td>145 mg/dL</td>
                                <td>70-99 mg/dL</td>
                                <td><i class="fas fa-exclamation-triangle text-danger"></i> Alto</td>
                            </tr>
                            <tr>
                                <td>Colesterol total</td>
                                <td>190 mg/dL</td>
                                <td>&lt;200 mg/dL</td>
                                <td><i class="fas fa-check text-success"></i> Normal</td>
                            </tr>
                            <tr class="abnormal">
                                <td>Presión arterial</td>
                                <td>140/90 mmHg</td>
                                <td>120/80 mmHg</td>
                                <td><i class="fas fa-exclamation-triangle text-danger"></i> Elevada</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <p>Recomiendo programar una cita de seguimiento lo antes posible para revisar estos resultados y ajustar su tratamiento si es necesario.</p>
                
                <p>Atentamente,</p>
                <p><strong>Dr. Juan Pérez</strong><br>
                Medicina Interna<br>
                Clínica San José</p>
                
                <div class="email-attachments">
                    <h6><i class="fas fa-paperclip"></i> Adjuntos (2)</h6>
                    <div class="attachment-list">
                        <div class="attachment-item">
                            <i class="far fa-file-pdf"></i>
                            <div>
                                <strong>Resultados_Laboratorio.pdf</strong>
                                <small>245 KB</small>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Descargar</button>
                        </div>
                        <div class="attachment-item">
                            <i class="far fa-file-image"></i>
                            <div>
                                <strong>ECG_030324.png</strong>
                                <small>1.2 MB</small>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">Descargar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="email-actions">
                <button class="btn btn-primary"><i class="fas fa-reply"></i> Responder</button>
                <button class="btn btn-outline-secondary"><i class="fas fa-reply-all"></i> Responder a todos</button>
                <button class="btn btn-outline-secondary"><i class="fas fa-share"></i> Reenviar</button>
            </div>
        </div>
        
        <!-- Compose Email Modal -->
        <div class="modal fade" id="composeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nuevo Mensaje</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="composeForm">
                            <div class="mb-3">
                                <label for="recipient" class="form-label">Para:</label>
                                <select class="form-select" id="recipient" multiple>
                                    <option value="dr.perez@clinica.com">Dr. Juan Pérez</option>
                                    <option value="dra.lopez@clinica.com">Dra. Ana López</option>
                                    <option value="laboratorio@clinica.com">Laboratorio Clínico</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Asunto:</label>
                                <input type="text" class="form-control" id="subject" placeholder="Asunto del mensaje">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Mensaje:</label>
                                <textarea class="form-control" id="message" rows="10" placeholder="Escriba su mensaje aquí..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Adjuntos:</label>
                                <div class="dropzone" id="attachmentDropzone">
                                    <div class="dz-message">
                                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                                        <p>Arrastre archivos aquí o haga clic para seleccionar</p>
                                    </div>
                                </div>
                                <div id="attachmentPreview" class="mt-2"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar borrador</button>
                        <button type="button" class="btn btn-success">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.js"></script>
</body>
</html>