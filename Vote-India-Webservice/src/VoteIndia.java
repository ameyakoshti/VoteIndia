import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;

import org.json.JSONException;
import org.json.JSONObject;
import org.json.XML;
import org.openrdf.OpenRDFException;
import org.openrdf.model.Value;
import org.openrdf.query.BindingSet;
import org.openrdf.query.QueryLanguage;
import org.openrdf.query.TupleQuery;
import org.openrdf.query.TupleQueryResult;
import org.openrdf.repository.Repository;
import org.openrdf.repository.RepositoryConnection;
import org.openrdf.repository.RepositoryException;
import org.openrdf.repository.sail.SailRepository;
import org.openrdf.rio.RDFFormat;
import org.openrdf.rio.RDFParseException;
import org.openrdf.sail.nativerdf.NativeStore;

import com.hp.hpl.jena.query.QueryExecution;
import com.hp.hpl.jena.query.QueryExecutionFactory;
import com.hp.hpl.jena.query.QuerySolution;
import com.hp.hpl.jena.query.ResultSet;

public class VoteIndia {
	private static HashMap<String, String> politicalParties;
	private static List<String> allFactors;
	private static ArrayList<ChiefMinisters> listOfCMs;

	private static HashMap<Integer, Double> industry;
	private static HashMap<Integer, Double> female;
	private static HashMap<Integer, Double> male;
	private static HashMap<Integer, Double> mining;
	private static HashMap<Integer, Double> manufacturing;
	private static HashMap<Integer, Double> service;
	private static HashMap<Integer, Double> agriculture;
	private static HashMap<Integer, Double> yearBasedScore;

	public static void main(String[] args) throws RepositoryException {

		// Initial core-data
		initialize();

		int performOperationNo = 2;

		switch (performOperationNo) {
		case 1: {
			createRepository();
			break;
		}
		case 2: {
			File repoLocation = new File("548");
			Repository myRepository = new SailRepository(new NativeStore(repoLocation));
			try {
				myRepository.initialize();
			} catch (RepositoryException e) {
				e.printStackTrace();
			}

			String state = "Maharashtra";

			String xmlData = getAllData(myRepository, state);

			JSONObject xmlJSONObj;
			String JSONData;

			try {
				xmlJSONObj = XML.toJSONObject(xmlData);
				JSONData = xmlJSONObj.toString();
			} catch (JSONException e) {
				e.printStackTrace();
				JSONData = "error";
			}

			System.out.println(JSONData);

			/*
			 * try { myRepository.shutDown(); } catch (RepositoryException e) {
			 * e.printStackTrace(); }
			 */

			break;
		}
		case 3: {
			getStateJSON("Maharashtra");
			break;
		}
		case 4: {
			break;
		}

		}

	}

	public static void initialize() {
		politicalParties = new HashMap<String, String>();
		politicalParties.put("bharatiya", "Bharatiya Janta Party");
		politicalParties.put("congress", "Indian National Congress");
		politicalParties.put("bahujan", "Bahujan Samaj Party");
		politicalParties.put("samajwadi", "Samajwadi Party");
		politicalParties.put("samata", "Samata Party");
		politicalParties.put("communist", "Communist Party of India");
		politicalParties.put("rashtriya", "Rashtriya Janata Dal");
		politicalParties.put("shiv", "Shiv Sena");
		politicalParties.put("marxist", "Communist Party of India (Marxist)");

		allFactors = new ArrayList<String>();
		allFactors.add("Services growth");
		allFactors.add("Agriculture and Allied growth");
		allFactors.add("Female Literacy Rate");
		allFactors.add("Male Literacy Rate");
		allFactors.add("Industry growth");
		allFactors.add("Manufacturing growth");
		allFactors.add("Mining and Quarrying growth");
	}

	public static void createRepository() {
		File repoLocation = new File("548");

		// Factors Data
		File RDFFactor1 = new File("WSP1VW1.ttl");
		File RDFFactor2 = new File("WSP1VW2.ttl");
		File RDFFactor3 = new File("WSP1VW3.ttl");
		File RDFFactor4 = new File("WSP1VW4.ttl");
		File RDFFactor5 = new File("WSP1VW5.ttl");
		File RDFFactor6 = new File("WSP1VW6.ttl");
		File RDFFactor7 = new File("WSP1VW7.ttl");
		File RDFFactor8 = new File("WSP1VW8.ttl");
		// CM Data
		File RDFFactor9 = new File("WSP1VW9.ttl");
		// State Data
		File RDFFactor10 = new File("WSP1VW10.ttl");

		String baseURI = "548";

		Repository newLocalRepository = new SailRepository(new NativeStore(repoLocation));

		try {
			newLocalRepository.initialize();
			RepositoryConnection con = newLocalRepository.getConnection();
			try {
				con.add(RDFFactor1, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor2, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor3, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor4, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor5, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor6, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor7, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor8, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor9, baseURI, RDFFormat.TURTLE);
				con.add(RDFFactor10, baseURI, RDFFormat.TURTLE);

			} catch (RDFParseException e) {
				e.printStackTrace();
				System.out.println(e);
			} catch (IOException e) {
				System.out.println(e);
				e.printStackTrace();
			}

			newLocalRepository.shutDown();

		} catch (RepositoryException e) {
			e.printStackTrace();
		}
	}

	public static String getAllData(Repository localRepository, String state) {

		int year;
		String value = "";
		industry = new HashMap<Integer, Double>();
		female = new HashMap<Integer, Double>();
		male = new HashMap<Integer, Double>();
		mining = new HashMap<Integer, Double>();
		manufacturing = new HashMap<Integer, Double>();
		service = new HashMap<Integer, Double>();
		agriculture = new HashMap<Integer, Double>();
		yearBasedScore = new HashMap<Integer, Double>();

		HashMap<String, String> factorValue = new HashMap<String, String>();
		String XML = "<state name=\"" + state + "\">";

		// Make calls based on all the years

		getCMFromLocalStore(localRepository, state);

		for (year = 2012; year >= 2000; year--) {
			System.out.println("Year:" + year);
			XML += "<year yearvalue=\"" + year + "\">";
			// Get the list of CMs for a particular year
			System.out.println("Getting CMs...");

			XML += "<cms>";
			for (int cmIndex = 0; cmIndex < listOfCMs.size(); cmIndex++) {
				if (Integer.parseInt(listOfCMs.get(cmIndex).startYear) <= year && year <= Integer.parseInt(listOfCMs.get(cmIndex).endYear)) {
					XML += "<cm cmname=\"" + listOfCMs.get(cmIndex).cmName + "\"/>";
				}
			}
			XML += "</cms>";

			System.out.println("Getting Factors...");
			// Get the values of all the factors based on the year
			XML += "<factors>";
			for (int factorIndex = 0; factorIndex < allFactors.size(); factorIndex++) {
				value = coreDatabase(localRepository, state, year, allFactors.get(factorIndex));
				factorValue.put(allFactors.get(factorIndex), value);
			}

			// double score = 0;

			Iterator<Entry<String, String>> it = factorValue.entrySet().iterator();
			while (it.hasNext()) {
				Map.Entry<String, String> pairsFactorValue = (Map.Entry<String, String>) it.next();
				XML += "<factor factorname=\"" + pairsFactorValue.getKey() + "\" factorvalue=\"" + pairsFactorValue.getValue() + "\"/>";
				switch (pairsFactorValue.getKey()) {
				case "Industry growth": {
					if (pairsFactorValue.getValue() != "NA") {
						// score +=
						// Double.parseDouble(pairsFactorValue.getValue()) * 20;
						industry.put(year, Double.parseDouble(pairsFactorValue.getValue()));
					}
					break;
				}
				case "Female Literacy Rate": {
					if (pairsFactorValue.getValue() != "NA") {
						// score +=
						// Double.parseDouble(pairsFactorValue.getValue()) * 12;
						female.put(year, Double.parseDouble(pairsFactorValue.getValue()));
					}
					break;
				}
				case "Male Literacy Rate": {
					if (pairsFactorValue.getValue() != "NA") {
						// score +=
						// Double.parseDouble(pairsFactorValue.getValue()) * 12;
						male.put(year, Double.parseDouble(pairsFactorValue.getValue()));
					}
					break;
				}
				case "Mining and Quarrying growth": {
					if (pairsFactorValue.getValue() != "NA") {
						// score +=
						// Double.parseDouble(pairsFactorValue.getValue()) * 12;
						mining.put(year, Double.parseDouble(pairsFactorValue.getValue()));
					}
					break;
				}
				case "Manufacturing growth": {
					if (pairsFactorValue.getValue() != "NA") {
						// score +=
						// Double.parseDouble(pairsFactorValue.getValue()) * 12;
						manufacturing.put(year, Double.parseDouble(pairsFactorValue.getValue()));
					}
					break;
				}
				case "Services growth": {
					if (pairsFactorValue.getValue() != "NA") {
						// score +=
						// Double.parseDouble(pairsFactorValue.getValue()) * 12;
						service.put(year, Double.parseDouble(pairsFactorValue.getValue()));
					}
					break;
				}
				case "Agriculture and Allied growth": {
					if (pairsFactorValue.getValue() != "NA") {
						// score +=
						// Double.parseDouble(pairsFactorValue.getValue()) * 20;
						agriculture.put(year, Double.parseDouble(pairsFactorValue.getValue()));
					}
					break;
				}
				}
			}

			XML += "</factors>";
			XML += "</year>";
		}

		generateYearWiseScore();

		XML += "</state>";
		// System.out.println(XML);
		return XML;
	}

	public static void generateYearWiseScore() {
		Double totalGrowth = 0.0;
		Double averageGrowth = 0.0;
		int availableFactors = 0;

		// Calculate average score of each factor over all years
		Iterator<Entry<Integer, Double>> it;
		Map.Entry<Integer, Double> pairsYearValue;

		it = industry.entrySet().iterator();
		while (it.hasNext()) {
			availableFactors++;
			pairsYearValue = (Map.Entry<Integer, Double>) it.next();
			totalGrowth += pairsYearValue.getValue();
		}
		averageGrowth = totalGrowth / availableFactors;
		industry.put(9999, averageGrowth);

		totalGrowth = 0.0;
		averageGrowth = 0.0;
		availableFactors = 0;
		it = female.entrySet().iterator();
		while (it.hasNext()) {
			availableFactors++;
			pairsYearValue = (Map.Entry<Integer, Double>) it.next();
			totalGrowth += pairsYearValue.getValue();
		}
		averageGrowth = totalGrowth / availableFactors;
		female.put(9999, averageGrowth);

		totalGrowth = 0.0;
		averageGrowth = 0.0;
		availableFactors = 0;
		it = male.entrySet().iterator();
		while (it.hasNext()) {
			availableFactors++;
			pairsYearValue = (Map.Entry<Integer, Double>) it.next();
			totalGrowth += pairsYearValue.getValue();
		}
		averageGrowth = totalGrowth / availableFactors;
		male.put(9999, averageGrowth);

		totalGrowth = 0.0;
		averageGrowth = 0.0;
		availableFactors = 0;
		it = mining.entrySet().iterator();
		while (it.hasNext()) {
			availableFactors++;
			pairsYearValue = (Map.Entry<Integer, Double>) it.next();
			totalGrowth += pairsYearValue.getValue();
		}
		averageGrowth = totalGrowth / availableFactors;
		mining.put(9999, averageGrowth);

		totalGrowth = 0.0;
		averageGrowth = 0.0;
		availableFactors = 0;
		it = manufacturing.entrySet().iterator();
		while (it.hasNext()) {
			availableFactors++;
			pairsYearValue = (Map.Entry<Integer, Double>) it.next();
			totalGrowth += pairsYearValue.getValue();
		}
		averageGrowth = totalGrowth / availableFactors;
		manufacturing.put(9999, averageGrowth);

		totalGrowth = 0.0;
		averageGrowth = 0.0;
		availableFactors = 0;
		it = service.entrySet().iterator();
		while (it.hasNext()) {
			availableFactors++;
			pairsYearValue = (Map.Entry<Integer, Double>) it.next();
			totalGrowth += pairsYearValue.getValue();
		}
		averageGrowth = totalGrowth / availableFactors;
		service.put(9999, averageGrowth);

		totalGrowth = 0.0;
		averageGrowth = 0.0;
		availableFactors = 0;
		it = agriculture.entrySet().iterator();
		while (it.hasNext()) {
			availableFactors++;
			pairsYearValue = (Map.Entry<Integer, Double>) it.next();
			totalGrowth += pairsYearValue.getValue();
		}
		averageGrowth = totalGrowth / availableFactors;
		agriculture.put(9999, averageGrowth);

		// Calculate per year score considering weights of each factor
		int weight20 = 20;
		int weight12 = 12;
		Double yearScore;

		for (int year = 2000; year < 2013; year++) {
			availableFactors = 0;
			yearScore = 0.0;

			// year score = normalized growth of a factor X weight of the factor

			if (industry.containsKey(year)) {
				// if (industry.get(year) > industry.get(9999))
				yearScore += ((industry.get(year) / industry.get(9999)) * 10) * weight20;
				// else
				// yearScore = yearScore - ((industry.get(year) /
				// industry.get(9999)) * 10) * weight20;
				availableFactors += weight20;
			}
			if (female.containsKey(year)) {
				// if (female.get(year) > female.get(9999))
				yearScore += ((female.get(year) / female.get(9999)) * 10) * weight12;
				// else
				// yearScore -= ((female.get(year) / female.get(9999)) * 10) *
				// weight12;
				availableFactors += weight12;
			}
			if (male.containsKey(year)) {
				// if (male.get(year) > male.get(9999))
				yearScore += ((male.get(year) / male.get(9999)) * 10) * weight12;
				// else
				// yearScore -= ((male.get(year) / male.get(9999)) * 10) *
				// weight12;
				availableFactors += weight12;
			}
			if (mining.containsKey(year)) {
				// if (mining.get(year) > mining.get(9999))
				yearScore += ((mining.get(year) / mining.get(9999)) * 10) * weight12;
				// else
				// yearScore -= ((mining.get(year) / mining.get(9999)) * 10) *
				// weight12;
				availableFactors += weight12;
			}
			if (manufacturing.containsKey(year)) {
				// if (manufacturing.get(year) > manufacturing.get(9999))
				yearScore += ((manufacturing.get(year) / manufacturing.get(9999)) * 10) * weight12;
				// else
				// yearScore -= ((manufacturing.get(year) /
				// manufacturing.get(9999)) * 10) * weight12;
				availableFactors += weight12;
			}
			if (service.containsKey(year)) {
				// if (service.get(year) > service.get(9999))
				yearScore += ((service.get(year) / service.get(9999)) * 10) * weight12;
				// else
				// yearScore -= ((service.get(year) / service.get(9999)) * 10) *
				// weight12;
				availableFactors += weight12;
			}
			if (agriculture.containsKey(year)) {
				// if (agriculture.get(year) > agriculture.get(9999))
				yearScore += ((agriculture.get(year) / agriculture.get(9999)) * 10) * weight20;
				// else
				// yearScore -= ((agriculture.get(year) / agriculture.get(9999))
				// * 10) * weight20;
				availableFactors += weight20;
			}

			yearBasedScore.put(year, yearScore / (availableFactors));
		}
	}

	public static Double getCMPredictedScore() {
		Double score = 0.0;

		return score;
	}

	public static List<String> getCMFromDBpedia(int year, String state) {
		String service = "http://dbpedia.org/sparql";

		String queryStartDate = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>" + "PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>" + "PREFIX dbpedia: <http://dbpedia.org/resource/>"
				+ "PREFIX dcterms: <http://purl.org/dc/terms/>" + "PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>" + "PREFIX category: <http://dbpedia.org/resource/Category:>"
				+ "PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>" + "SELECT DISTINCT ?URIOfCM (GROUP_CONCAT(STR(?startyear); separator = \";\") as ?startyear) WHERE {"
				+ "?URIOfCM dcterms:subject category:Chief_Ministers_of_" + state + "." + "?URIOfCM dbpedia-owl:activeYearsStartDate ?startyear."
				+ "FILTER(xsd:date(?startyear) > \"1990-01-01\"^^xsd:date)" + "} GROUP BY ?URIOfCM";

		String queryEndDate = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>" + "PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>" + "PREFIX dbpedia: <http://dbpedia.org/resource/>"
				+ "PREFIX dcterms: <http://purl.org/dc/terms/>" + "PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>" + "PREFIX category: <http://dbpedia.org/resource/Category:>"
				+ "PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>" + "SELECT DISTINCT ?URIOfCM (GROUP_CONCAT(STR(?endyear); separator = \";\") as ?endyear) WHERE {"
				+ "?URIOfCM dcterms:subject category:Chief_Ministers_of_" + state + "." + "?URIOfCM dbpedia-owl:activeYearsEndDate ?endyear." + "FILTER(xsd:date(?endyear) > \"1990-01-01\"^^xsd:date)"
				+ "} GROUP BY ?URIOfCM";

		QueryExecution qeStartDate = QueryExecutionFactory.sparqlService(service, queryStartDate);
		QueryExecution qeEndDate = QueryExecutionFactory.sparqlService(service, queryEndDate);

		QuerySolution solStartDate;
		QuerySolution solEndDate;

		// Contains the list of CM for that "year" variable
		List<String> CM = new ArrayList<String>();

		HashMap<String, String> hmStartDate = new HashMap<String, String>();
		HashMap<String, String> hmEndDate = new HashMap<String, String>();

		try {
			ResultSet resultStartDate = qeStartDate.execSelect();
			ResultSet resultEndDate = qeEndDate.execSelect();

			// Create hashmap for the CM and start date
			while (resultStartDate.hasNext()) {
				solStartDate = (QuerySolution) resultStartDate.next();
				hmStartDate.put(solStartDate.get("?URIOfCM").toString(), solStartDate.get("?startyear").toString());
			}

			// Create hashmap for the CM and end date
			while (resultEndDate.hasNext()) {
				solEndDate = (QuerySolution) resultEndDate.next();
				hmEndDate.put(solEndDate.get("?URIOfCM").toString(), solEndDate.get("?endyear").toString());
			}

			Iterator<Entry<String, String>> it = hmStartDate.entrySet().iterator();
			while (it.hasNext()) {
				Map.Entry<String, String> pairsStartYear = (Map.Entry<String, String>) it.next();
				// System.out.println(pairs.getKey() + " = " +
				// pairs.getValue());

				if (hmEndDate.containsKey(pairsStartYear.getKey())) {
					String[] startDates = pairsStartYear.getValue().toString().split(";");
					String[] endDates = hmEndDate.get(pairsStartYear.getKey()).toString().split(";");

					for (int i = 0; i < startDates.length; i++) {
						String[] startYear = startDates[i].split("-");
						String[] endYear = null;
						try {
							endYear = endDates[i].split("-");
						} catch (Exception e) {
							// corresponding end date not found
							endYear = "2013-01-01".split("-");
						}

						if (Integer.parseInt(startYear[0]) <= year && year <= Integer.parseInt(endYear[0])) {
							// CM Found!!
							CM.add(pairsStartYear.getKey().toString());
						}
					}
				}

				it.remove();
			}
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
			qeStartDate.close();
			qeEndDate.close();
		}
		return CM;
	}

	public static void getCMFromLocalStore(Repository myRepository, String state) {

		ChiefMinisters cmObj;
		listOfCMs = new ArrayList<ChiefMinisters>();

		try {
			RepositoryConnection con = myRepository.getConnection();

			try {
				String queryStartDate = "PREFIX ex:<http://example.com/>" + "PREFIX cm:<http://example.com/CM/>" + "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>"
						+ "PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>" + "PREFIX foaf: <http://xmlns.com/foaf/0.1/>" + "SELECT ?cmname ?startyear where {" + "?cm rdf:type ex:CM."
						+ "?cm ex:state \"" + state + "\"." + "?cm foaf:name ?cmname." + "?cm cm:joinOffice ?startyear}";

				String queryEndDate = "PREFIX ex:<http://example.com/>" + "PREFIX cm:<http://example.com/CM/>" + "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>"
						+ "PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>" + "PREFIX foaf: <http://xmlns.com/foaf/0.1/>" + "SELECT ?cmname ?endyear where {" + "?cm rdf:type ex:CM."
						+ "?cm ex:state \"" + state + "\"." + "?cm foaf:name ?cmname." + "?cm cm:endOffice ?endyear }";

				TupleQuery tupleQueryStartDate = con.prepareTupleQuery(QueryLanguage.SPARQL, queryStartDate);
				TupleQueryResult resultStartDate = tupleQueryStartDate.evaluate();

				TupleQuery tupleQueryEndDate = con.prepareTupleQuery(QueryLanguage.SPARQL, queryEndDate);
				TupleQueryResult resultEndDate = tupleQueryEndDate.evaluate();

				try {

					List<String> bindingNamesStartDate = resultStartDate.getBindingNames();
					List<String> bindingNamesEndDate = resultEndDate.getBindingNames();
					while (resultStartDate.hasNext()) {

						BindingSet bsStartDate = resultStartDate.next();
						BindingSet bsEndDate = resultEndDate.next();

						cmObj = new ChiefMinisters();
						cmObj.cmName = bsStartDate.getValue(bindingNamesStartDate.get(0)).toString().replace("\"", "");
						cmObj.startYear = bsStartDate.getValue(bindingNamesStartDate.get(1)).toString().replace("\"", "");
						cmObj.startYear = cmObj.startYear.split("-")[2];
						if (!bsEndDate.getValue(bindingNamesEndDate.get(1)).toString().replace("\"", "").matches(".*\\d.*")) {
							cmObj.endYear = "2013";
						} else {
							cmObj.endYear = bsEndDate.getValue(bindingNamesEndDate.get(1)).toString().replace("\"", "");
							cmObj.endYear = cmObj.endYear.split("-")[2];
						}
						cmObj.imageURL = "";

						listOfCMs.add(cmObj);

					}

				} finally {
					printlistOfCMs();
					resultStartDate.close();
					resultEndDate.close();
				}
			} finally {
				con.close();
			}
		} catch (OpenRDFException e) {
			e.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
			System.out.println(e.toString());
		}
	}

	public static void printlistOfCMs() {
		for (ChiefMinisters cm : listOfCMs) {
			System.out.println(cm.cmName);
			System.out.println(cm.startYear);
			System.out.println(cm.endYear);
		}
	}

	public static String coreDatabase(Repository myRepository, String state, int year, String factor) {
		String factorValue = "NA";
		try {
			RepositoryConnection con = myRepository.getConnection();

			try {
				String queryString = "PREFIX ex:<http://example.com/> " + "select * where{" + "?x ex:state \"" + state + "\"." + "?x ex:factor \"" + factor + "\"." + "?x ex:year \"" + year + "\"."
						+ "?x ex:value ?y." + "}";
				TupleQuery tupleQuery = con.prepareTupleQuery(QueryLanguage.SPARQL, queryString);
				TupleQueryResult result = tupleQuery.evaluate();

				try {
					List<String> bindingNames = result.getBindingNames();
					while (result.hasNext()) {
						BindingSet bindingSet = result.next();
						factorValue = bindingSet.getValue(bindingNames.get(1)).toString();
					}
				} finally {
					result.close();
				}
			} finally {
				con.close();
			}
		} catch (OpenRDFException e) {
			e.printStackTrace();
		}
		if (factorValue == "") {
			return "NA";
		} else {
			return factorValue.replace("\"", "");
		}
	}

	public static String getStateJSON(String state) throws RepositoryException {
		String XML = "";
		File dataDir = new File("548");
		String newState = state.replace(" ", "_");
		if (newState.contains("&"))
			newState = newState.replace("&", "and");

		newState = "<http://dbpedia.org/resource/" + newState + ">";
		System.out.println(newState);
		Repository Repo = new SailRepository(new NativeStore(dataDir));
		Repo.initialize();
		XML = XML + "<State>";
		try {
			RepositoryConnection con = Repo.getConnection();

			try {
				String queryString = "prefix rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>" + "prefix foaf: <http://xmlns.com/foaf/0.1/>" + "prefix ex: <http://example.com/>"
						+ "prefix purl: <http://purl.org/dc/elements/1.1/> " + "prefix purl2: <http://purl.org/ontology/places#>" + "prefix oecc: <http://www.oegov.org/core/owl/cc#>"

						+ "select ?coor ?pop ?desc ?url ?capital ?img where"

						+ "{ " + newState + " purl:description ?desc. " + newState + " ex:value ?pop. " + newState + " purl2:point_on_map ?coor. " + newState + " oecc:url ?url. " + newState
						+ " foaf:member ?capital. " + newState + " oecc:image ?img. " + "}";

				System.out.println(queryString);
				TupleQuery tupleQuery = con.prepareTupleQuery(QueryLanguage.SPARQL, queryString);
				TupleQueryResult result = tupleQuery.evaluate();

				try {
					while (result.hasNext()) {
						BindingSet bindingSet = result.next();
						Value valueOfcoor = bindingSet.getValue("coor");
						Value valueOfcapital = bindingSet.getValue("capital");
						Value valueOfpop = bindingSet.getValue("pop");
						Value valueOfdesc = bindingSet.getValue("desc");
						Value valueOfurl = bindingSet.getValue("url");
						Value valueOfimg = bindingSet.getValue("img");

						String coor = valueOfcoor.stringValue();
						String capital = valueOfcapital.stringValue();
						String pop = valueOfpop.stringValue();
						String url = valueOfurl.stringValue();
						String img = valueOfimg.stringValue();
						String desc = valueOfdesc.stringValue().replace("&", "");

						XML = XML + "<Capital>" + capital + "</Capital>";
						XML = XML + "<Coordinate>" + coor + "</Coordinate>";
						XML = XML + "<Population>" + pop + "</Population>";
						XML = XML + "<Url>" + url + "</Url>";
						XML = XML + "<Image>" + img + "</Image>";
						XML = XML + "<Desc>" + desc + "</Desc>";

					}
					XML = XML + "</State>";
					System.out.println(XML);
					String State_Json = XMLtoJSON(XML);
					System.out.println(State_Json);
				} finally {
					result.close();
				}
			} finally {
				con.close();
			}
		} catch (OpenRDFException e) {
			// handle exception
		}
		return null;
	}

	public static String XMLtoJSON(String xmlData) {

		JSONObject xmlJSONObj;
		String JSONData;

		try {
			xmlJSONObj = XML.toJSONObject(xmlData);
			JSONData = xmlJSONObj.toString();
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			JSONData = "error";
		}

		// System.out.println(JSONData);
		return JSONData;
	}

}
