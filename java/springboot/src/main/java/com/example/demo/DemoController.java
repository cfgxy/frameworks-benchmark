package com.example.demo;

import com.example.demo.data.CommonType;
import com.example.demo.data.CommonTypeRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Lazy;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import java.util.Optional;

@RestController
public class DemoController {

    @Lazy@Autowired
    CommonTypeRepository commonTypeRepository;

    @GetMapping("/hello")
    public String hello() {
        return "Hello World";
    }

    @GetMapping("/jpa")
    public String jpa() {
        Optional<CommonType> t = commonTypeRepository.findById(1L);
        if (t.isEmpty()) {
            return "Hello";
        }

        return String.format("Hello %s, from jpa", t.get().getTypeName());
    }
}
