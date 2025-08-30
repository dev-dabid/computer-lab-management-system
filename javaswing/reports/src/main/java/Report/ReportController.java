
package Report;

import javax.validation.Valid;
import org.springframework.web.bind.annotation.PutMapping;
import java.net.URI;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.CrossOrigin;
import java.util.Optional;




@RestController
@CrossOrigin(origins = "http://localhost:3000")
@RequestMapping("/api/reports")
public class ReportController {

    private final ReportRepository reportRepository;

    @Autowired
    public ReportController(ReportRepository reportRepository) {
        this.reportRepository = reportRepository;
    }

    // GET all reports
    @GetMapping
    public List<Report> getAllReports() {
        return reportRepository.findAll();
    }

    // GET a single report by ID
    @GetMapping("/{id}")
    public ResponseEntity<Report> getReportById(@PathVariable Long id) {
        Optional<Report> report = reportRepository.findById(id);
        return report.map(ResponseEntity::ok).orElseGet(() -> ResponseEntity.notFound().build());
    }

    // POST a new report
    @PostMapping
    public ResponseEntity<Report> createReport(@Valid @RequestBody Report report) {
        Report savedReport = reportRepository.save(report);
        return ResponseEntity.created(URI.create("/api/reports/" + savedReport.getId())).body(savedReport);
    }

    // PUT or UPDATE an existing report by ID
  @PutMapping("/reports/{id}")
public ResponseEntity<Report> updateReport(@PathVariable(value = "id") Long reportId,
                                            @Valid @RequestBody Report reportDetails) throws ResourceNotFoundException {
    Report report = reportRepository.findById(reportId)
            .orElseThrow(() -> new ResourceNotFoundException("Report not found for this id :: " + reportId));

    report.setDevice(reportDetails.getDevice());
    report.setSpecify(reportDetails.getSpecify());
    report.setUsername(reportDetails.getUsername());
    report.setHostname(reportDetails.getHostname());
    report.setTimestamp(reportDetails.getTimestamp());

    Report updatedReport = reportRepository.save(report);
    updatedReport.setId(reportId);

    return ResponseEntity.ok(updatedReport);
}


    // DELETE a report by ID
    @DeleteMapping("/{id}")
    public ResponseEntity<Void> deleteReport(@PathVariable Long id) {
        reportRepository.deleteById(id);
        return ResponseEntity.noContent().build();
    }
}
