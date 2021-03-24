package com.example.data;

import io.quarkus.hibernate.orm.panache.PanacheRepository;

import javax.enterprise.context.ApplicationScoped;

@ApplicationScoped
public class CommonTypeRepository implements PanacheRepository<CommonType> {
}
