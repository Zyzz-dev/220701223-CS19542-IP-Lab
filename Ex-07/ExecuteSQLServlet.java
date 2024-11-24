import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.Statement;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class ExecuteSQLServlet extends HttpServlet {
    private static final String DB_URL = "jdbc:mysql://localhost:3306/student";
    private static final String DB_USER = "root";
    private static final String DB_PASSWORD = "";

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String sqlCommand = request.getParameter("sqlCommand");
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection conn = DriverManager.getConnection(DB_URL, DB_USER, DB_PASSWORD);
            Statement stmt = conn.createStatement();

            // Execute the SQL command
            boolean isResultSet = stmt.execute(sqlCommand);

            out.println("<h3>SQL Execution Result</h3>");
            if (!isResultSet) {
                int updateCount = stmt.getUpdateCount();
                out.println("<p>Command executed successfully. Rows affected: " + updateCount + "</p>");
            } else {
                out.println("<p>Query executed successfully. Check the database for results.</p>");
            }

            conn.close();
        } catch (Exception e) {
            out.println("<p>Error executing SQL command: " + e.getMessage() + "</p>");
            e.printStackTrace();
        }
    }
}
