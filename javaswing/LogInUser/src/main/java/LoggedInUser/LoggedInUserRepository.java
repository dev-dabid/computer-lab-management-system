/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Interface.java to edit this template
 */
package LoggedInUser;

import org.springframework.data.jpa.repository.JpaRepository;

/**
 *
 * @author David
 */
public interface LoggedInUserRepository extends JpaRepository<LoggedInUser, Long> {

    // add any custom queries or methods as needed
}