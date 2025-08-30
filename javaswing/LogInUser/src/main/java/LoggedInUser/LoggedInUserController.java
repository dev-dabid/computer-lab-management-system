
package LoggedInUser; 


import org.springframework.web.bind.annotation.PutMapping;
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


import java.time.LocalDateTime;
import java.util.List;

@RestController
@RequestMapping("/api/logged-in-users")
public class LoggedInUserController {

     @Autowired
    private LoggedInUserRepository loggedInUserRepository;

    @GetMapping("/logged_in_users")
    public ResponseEntity<List<LoggedInUser>> getAllLoggedInUsers() {
        List<LoggedInUser> loggedInUsers = loggedInUserRepository.findAll();
        return new ResponseEntity<>(loggedInUsers, HttpStatus.OK);
    }

    @PostMapping("/logged_in_users")
    public ResponseEntity<LoggedInUser> addLoggedInUser(@RequestBody LoggedInUser loggedInUser) {
        // Set the login time to the current time
        loggedInUser.setLoginTime(LocalDateTime.now());

        LoggedInUser savedLoggedInUser = loggedInUserRepository.save(loggedInUser);

        return new ResponseEntity<>(savedLoggedInUser, HttpStatus.CREATED);
    }

    @PutMapping("/logged_in_users/{id}")
    public ResponseEntity<LoggedInUser> updateLoggedInUser(@PathVariable("id") Long id, @RequestBody LoggedInUser loggedInUser) {
        LoggedInUser existingLoggedInUser = loggedInUserRepository.findById(id).orElse(null);

        if (existingLoggedInUser == null) {
            return new ResponseEntity<>(HttpStatus.NOT_FOUND);
        }

        // Update the existing logged in user
        existingLoggedInUser.setUsername(loggedInUser.getUsername());
        existingLoggedInUser.setHostname(loggedInUser.getHostname());
        existingLoggedInUser.setLoginStatus(loggedInUser.getLoginStatus());

        // Set the logout time to the current time if the login status is false
        if (!loggedInUser.getLoginStatus()) {
            existingLoggedInUser.setLogoutTime(LocalDateTime.now());
        }

        LoggedInUser updatedLoggedInUser = loggedInUserRepository.save(existingLoggedInUser);

        return new ResponseEntity<>(updatedLoggedInUser, HttpStatus.OK);
    }

    @DeleteMapping("/logged_in_users/{id}")
    public ResponseEntity<HttpStatus> deleteLoggedInUser(@PathVariable("id") Long id) {
        try {
            loggedInUserRepository.deleteById(id);
        } catch (Exception e) {
            return new ResponseEntity<>(HttpStatus.INTERNAL_SERVER_ERROR);
        }

        return new ResponseEntity<>(HttpStatus.NO_CONTENT);
    }

    @RequestMapping("/error")
    public String handleError() {
        // Handle the error here
        return "Error";
    }
}