<%-- 
    Document   : login_cek
    Created on : 01 Nov 18, 14:36:45
    Author     : ASUS
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*" %>
<%
     String userid=request.getParameter("username");
     String pwd=request.getParameter("password");
     Class.forName("com.mysql.jdbc.Driver");
     Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/modul1","root","");
     Statement st=con.createStatement();
     ResultSet rs;
     rs = st.executeQuery("select*from login where username='"+userid+"' and password='"+pwd+"'");
     if(rs.next())
     {
         session.setAttribute("userid",userid);
         out.println("welcome"+userid);
         out.println("<a href='logout.jsp'>Log out</a>");
         response.sendRedirect("sukses.jsp");
     }
     else
     {
         out.println("Invalid password<a href'login.jsp'>try again</a>");
     }
%>