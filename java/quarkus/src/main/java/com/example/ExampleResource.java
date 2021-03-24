package com.example;

import com.example.data.CommonType;
import com.example.data.CommonTypeRepository;

import javax.inject.Inject;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

@Path("/hello")
public class ExampleResource {

    @Inject
    CommonTypeRepository commonTypeRepository;

    @GET
    @Produces(MediaType.TEXT_PLAIN)
    public String hello() {
        return "Hello World";
    }


    @GET
    @Path("/jpa")
    @Produces(MediaType.TEXT_PLAIN)
    public String jpa() {
        CommonType t = commonTypeRepository.findById(1L);

        return String.format("Hello %s, from jpa", t.getTypeName());
    }

}