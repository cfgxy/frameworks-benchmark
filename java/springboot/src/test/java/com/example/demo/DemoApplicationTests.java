package com.example.demo;

import com.example.demo.data.CommonType;
import com.example.demo.data.CommonTypeRepository;
import com.example.demo.data.QCommonType;
import com.querydsl.core.QueryFactory;
import com.querydsl.jpa.impl.JPAQuery;
import com.querydsl.jpa.impl.JPAQueryFactory;
import org.junit.jupiter.api.Test;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;

import javax.persistence.EntityManager;

@SpringBootTest
class DemoApplicationTests {
    @Autowired
    protected CommonTypeRepository commonTypeRepository;

    @Autowired
    protected EntityManager em;

    @Test
    void contextLoads() {
        JPAQueryFactory queryFactory = new JPAQueryFactory(em);
        var aa = queryFactory.from(QCommonType.commonType)
                .where(QCommonType.commonType.typeId.eq(1L))
                .fetchOne();


        System.out.println(aa);
    }

}
