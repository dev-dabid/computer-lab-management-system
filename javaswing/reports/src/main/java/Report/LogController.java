/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
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
@RequestMapping("/api/log")
public class LogController {

    private final LogRepository logRepository;

    @Autowired
    public LogController(LogRepository logRepository) {
        this.logRepository = logRepository;
    }

    // GET all logs
    @GetMapping
    public List<Log> getAllLogs() {
        return logRepository.findAll();
    }

    // GET a single report by ID
    @GetMapping("/{id}")
    public ResponseEntity<Log> getLogById(@PathVariable Long id) {
        Optional<Log> log = logRepository.findById(id);
        return log.map(ResponseEntity::ok).orElseGet(() -> ResponseEntity.notFound().build());
    }

    // POST a new report
    @PostMapping
    public ResponseEntity<Log> createLog(@Valid @RequestBody Log log) {
        Log savedLog = logRepository.save(log);
        return ResponseEntity.created(URI.create("/api/log/" + savedLog.getId())).body(savedLog);
    }

    
}
